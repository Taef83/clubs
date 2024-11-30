<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\ClubLeader;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class LeaderController extends Controller
{
    use UploadImages;
    // Display a listing of the resource.
    public function index()
    {
        $items = ClubLeader::paginate(30);
        return view('control.leaders.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('control.leaders.add');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->validate([
                'club_leader_name'          => 'required|string|max:255',
                'club_leader_email'         => 'required|string|email|max:255|unique:clubLeader,club_leader_email',
                'password'                  => 'required|string|min:8',
                'club_leader_phone'         => 'required|numeric|saudi_phone|unique:clubLeader,club_leader_phone',
                'club_leader_image_profile' => 'nullable|image',
               'club_id'   => 'required|exists:club,club_id',
            ]);

        $data['club_leader_image_profile']  = $request->hasFile('club_leader_image_profile') ? $this->upload($request->club_leader_image_profile) : null;
        $data['club_leader_password']       = Hash::make($request->password);
        ClubLeader::create($data);
        return redirect()->route('control.leaders.index')->with('success', 'You have created item in database successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(ClubLeader $leader)
    {
        $item = $leader;
        return view('control.leaders.edit', compact('leader', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, ClubLeader $leader)
    {
        $data = $request->validate([
                'club_leader_name'        => 'required|string|max:255',
                'club_leader_email'       => 'required|string|email|max:255|unique:clubLeader,club_leader_email,' . $leader->id . ',club_leader_id',
                'password'          => 'nullable|string|min:8',
                'club_leader_phone'       => 'required|numeric|saudi_phone|unique:clubLeader,club_leader_phone,' . $leader->id . ',club_leader_id',
                'club_leader_image_profile' => 'nullable|image',
            'club_id'   => 'required|exists:club,club_id',
            ]);
        $data['club_leader_image_profile']  = $request->hasFile('club_leader_image_profile') ? $this->upload($request->club_leader_image_profile) : $leader->club_leader_image_profile;

        $data['club_leader_password']       = $request->password ? Hash::make($request->password) : $leader->club_leader_password;
        $leader->update($data);

        return redirect()->route('control.leaders.index')->with('success', 'You have updated item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(ClubLeader $leader)
    {
        $leader->delete();
        return redirect()->route('control.leaders.index')->with('success', 'You have delete item from database successfully.');
    }


    public function requests()
    {
        $pendingLeaders = ClubLeader::where('club_leader_status', 0)->paginate(30);
        return view('control.leaders.requests', compact('pendingLeaders'));
    }

    public function accept(ClubLeader $leader)
    {
        $leader->update(['club_leader_status' => 1]);
        return redirect()->route('control.leaders.requests')->with('success', 'Leader request accepted successfully.');
    }

    public function reject(ClubLeader $leader)
    {
        $leader->update(['club_leader_status' => 0]);
        return redirect()->route('control.leaders.requests')->with('success', 'Leader request rejected  successfully.');
    }

}
