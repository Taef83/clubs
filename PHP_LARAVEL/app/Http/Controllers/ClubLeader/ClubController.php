<?php

namespace App\Http\Controllers\ClubLeader;

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
        $items = Club::where('club_id', auth('leaders')->user()->club_id)->paginate(30);
        return view('club_leader.clubs.index', compact('items'));
    }

    // Show the form for editing the specified resource.
    public function edit(Club $club)
    {
        $item = $club;
        return view('club_leader.clubs.edit', compact('item'));
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
        return redirect()->route('leader.clubs.index')->with('success', 'You have updated item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('leader.clubs.index')->with('success', 'You have delete item from database successfully.');
    }
}
