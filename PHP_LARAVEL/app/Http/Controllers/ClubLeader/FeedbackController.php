<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class FeedbackController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $items = Feedback::whereHas('club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->paginate(30);
        return view('club_leader.feedbacks.index', compact('items'));
    }

    public function show(Feedback $feedback)
    {
        $item = $feedback;
        return view('club_leader.feedbacks.show', compact('item'));
    }
}
