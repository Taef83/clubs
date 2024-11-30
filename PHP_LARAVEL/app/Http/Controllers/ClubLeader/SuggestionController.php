<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Event;
use App\Models\Membership;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class SuggestionController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $items = Suggestion::query();
        if($request->c){
            $items = $items->where('club_id', $request->c);
        }
        $items = $items->whereHas('club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->latest('sent_time')->paginate(40);
        return view('club_leader.suggestions.index', compact('items'));
    }
}
