<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Event;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class MembershipController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $items = Membership::query();
        if($request->c){
            $items = $items->where('club_id', $request->c);
        }
        if($request->s){
            $items = $items->where('student_id', $request->s);
        }
        $items = $items->whereHas('club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->latest('joined_at')->paginate(40);
        return view('club_leader.memberships.index', compact('items'));
    }

    public function editStatus(Membership $membership, Request $request)
    {
        $membership->update([
            'status'    => $request->status
        ]);
        return redirect()->back()->with('success', 'The status has been changed');
    }
}
