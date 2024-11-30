<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Club;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Membership;
use App\Models\Suggestion;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    use UploadImages;

    public function index()
    {
        $leader = auth('leaders')->user();
        $club = Club::find($leader->club_id);
        $stats = [
            'certs' => Certificate::whereIn('event_id', $leader->events()->pluck('event_id')->toArray())->count(),
            'mems'  => Membership::where('club_id', $leader->club_id)->count(),
            'sugs'  => Suggestion::where('club_id', $leader->club_id)->count(),
            'feed'  => Feedback::where('club_id', $leader->club_id)->count(),
            'events' => $leader->events->count()
        ];

        // Group certificates by month
        $certificatesByMonth = Certificate::whereIn('event_id', $leader->events()->pluck('event_id'))
            ->selectRaw("DATE_FORMAT(issue_date, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');
        // Group events by month
        $eventsByMonth = Event::where('club_id', $club->club_id)
            ->selectRaw("DATE_FORMAT(start_date, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Group feedbacks by month
        $feedbacksByMonth = Feedback::where('club_id', $club->club_id)
            ->selectRaw("DATE_FORMAT(dateTime, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        return view('club_leader.main.home', compact('stats','club', 'certificatesByMonth', 'eventsByMonth', 'feedbacksByMonth'));
    }

    public function getProfile()
    {
        $user = auth('leaders')->user();
        return view('club_leader.my_profile.data', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $user = auth('leaders')->user();
        $data = $request->validate([
                'name'              => 'required|string|max:255',
                'email'             => 'required|string|email|max:255|unique:clubLeader,club_leader_email,' . $user->id . ',club_leader_id',
                'phone'             => 'required|saudi_phone|unique:clubLeader,club_leader_phone,' . $user->id . ',club_leader_id',
                'image'             => 'nullable|image',
                'password'          => 'nullable|string|min:8',
            ]);

        $data['password']   = !$request->password ? $user->club_leader_password : Hash::make($request->password);
        $data['image'] = $request->hasFile('image') && $request->image != '' ? $this->upload($request->image) : $user->club_leader_image_profile;
        $user->update([
            'club_leader_name'          => $data['name'],
            'club_leader_email'         => $data['email'],
            'club_leader_password'      => $data['password'],
            'club_leader_phone'         => $data['phone'],
            'club_leader_image_profile' => $data['image'],
        ]);
        return redirect()->back()->with('success', 'Your profile has been changed');
    }

}
