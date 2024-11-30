<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Club;
use App\Models\ClubLeader;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Membership;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'clubs'     => Club::count(),
            'students'  => Student::count(),
            'leaders'   => ClubLeader::count(),
            'feedback'  => Feedback::count(),
            'events'    => Event::count(),
            'membership'=> Membership::count()
        ];

        // Assuming 'Best Club of the Month' is based on the number of events
        $bestClub = Club::withCount('feedbacks')
            ->orderBy('feedbacks_count', 'desc')
            ->first();

        $clubs = Club::withCount(['events', 'memberships'])->get();

        $clubNames = $clubs->pluck('club_name');
        $eventCounts = $clubs->pluck('events_count');
        $membershipCounts = $clubs->pluck('memberships_count');

        return view('control.main.home', compact('stats', 'bestClub', 'clubNames', 'eventCounts', 'membershipCounts'));
    }


}
