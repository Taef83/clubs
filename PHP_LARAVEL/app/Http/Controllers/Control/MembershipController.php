<?php

namespace App\Http\Controllers\Control;

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
        $items = $items->paginate(40);
        return view('control.memberships.index', compact('items'));
   
    }
}
