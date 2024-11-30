<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ClubLeader;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class ClubController extends Controller
{
    use UploadImages;
    // Display a listing of the resource.
    public function index()
    {
        $items = Club::paginate(30);
        return view('control.clubs.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $leaders = ClubLeader::pluck('club_leader_name', 'club_leader_id');
        return view('control.clubs.add', compact('leaders'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->validate([
                'club_name'          => 'required|string|max:255',
                'mission_statement'         => 'required',
                'club_description'                  => 'nullable',
                'location'         => 'required',
                'club_image' => 'nullable|image'
            ]);
        $data['club_image']  = $request->hasFile('club_image') ? $this->upload($request->club_image) : null;
        Club::create($data);
        return redirect()->route('control.clubs.index')->with('success', 'You have created item in database successfully.');
    }

    public function edit(Club $club)
    {
        $item = $club;
        $leaders = ClubLeader::pluck('club_leader_name', 'club_leader_id');
        return view('control.clubs.edit', compact('leaders', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Club $club)
    {
        $data = $request->validate([
            'club_name'          => 'required|string|max:255',
            'mission_statement'         => 'required',
            'club_description'                  => 'nullable',
            'location'         => 'required',
            'club_image' => 'nullable|image'
        ]);
        $data['club_image']  = $request->hasFile('club_image') ? $this->upload($request->club_image) : $club->club_image;


        $club->update($data);

        return redirect()->route('control.clubs.index')->with('success', 'You have updated item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('control.clubs.index')->with('success', 'You have delete item from database successfully.');
    }
}
