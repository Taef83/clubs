<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Event;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
   public function membership(Club $club)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      if(!$member){
        $user->memberships()->create([
          'club_id'   => $club->id,
          'role_type' => 'normal',
          'joined_at' => date('Y-m-d'),
          'status'    => 'inactive'
        ]);
      }
      return redirect()->back()->with('success', 'Your request has been sent.');
   }

   public function event(Club $club, Event $event)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      // abort_if(!$member, 404);
      if(!$member){
         return redirect()->route('student.club', $club->id)->with('fail', 'You have to join the club first to be able to see the events.');
      }
      if($member->status != 'active'){
         return redirect()->route('student.club', $club->id)->with('fail', 'To be able to access to this event please wait till you membership activation.');
      }
      return view('student.clubs.event', compact('user', 'member', 'event', 'club'));
   }

   public function eventJoin(Club $club, Event $event, Request $request)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      if($member->status != 'active'){
       return redirect()->route('student.club', $club->id)->with('fail', 'To be able to access to this event please wait till you membership activation.');
      }
      abort_if(!$member || $user->registrations()->where('event_id', $event->id)->count(), 404);
      $user->registrations()->create([
        'event_id' => $event->id,
          'activity_id' => $request->activity_id?? null,
        'registration_date' => date('Y-m-d'),
        'role_type'         => 'student'
      ]);
      return redirect()->route('student.club', $club->id)->with('success', 'You are registered successfully for event ' . $event->event_name .'.');
   }

   public function suggestion(Club $club)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      if($member->status != 'active'){
       return redirect()->route('student.club', $club->id)->with('fail', 'To be able to access to this event please wait till you membership activation.');
      }
      abort_if(!$member, 404);
      return view('student.clubs.suggestion', compact('user', 'member', 'club'));
   }

   public function makeSuggestion(Club $club, Request $request)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      if($member->status != 'active'){
       return redirect()->route('student.club', $club->id)->with('fail', 'To be able to access to this event please wait till you membership activation.');
      }
      abort_if(!$member, 404);
      $user->suggestions()->create([
        'club_id' => $club->id,
        'content' => $request->content,
        'sent_time' => date('Y-m-d')
      ]);
      return redirect()->route('student.club', $club->id)->with('success', 'Your suggestion has been sent, Thank you.');
   }

   public function feedback(Club $club)
   {
      $user   = auth('students')->user();
      $member = $user->memberships()->where('club_id', $club->id)->first();
      if($member->status != 'active'){
       return redirect()->route('student.club', $club->id)->with('fail', 'To be able to access to this event please wait till you membership activation.');
      }
//      if($user->feedbacks()->where('club_id', $club->id)->count()){
//        return redirect()->route('student.club', $club->id)->with('fail', 'To be able to send feedback more than one to the same club.');
//       }
      abort_if(!$member, 404);
      $events = Event::whereIn('event_id', $user->registrations()->pluck('event_id')->toArray())->whereNotIn('event_id', $user->feedbacks()->pluck('event_id')->toArray())->get();
      return view('student.clubs.feedback', compact('user', 'member', 'club', 'events'));
   }

    public function sendFeedback(Club $club, Request $request)
    {
        $user = auth('students')->user();
        $member = $user->memberships()->where('club_id', $club->id)->first();
        if ($member->status != 'active') {
            return redirect()->route('student.club', $club->id)
                ->with('fail', 'Please wait for your membership activation to access this event.');
        }
        if (!$request->filled('event_id')) {
            return redirect()->route('student.club', $club->id)
                ->with('fail', 'No Event Selected, please select the event');
        }
//        if ($user->feedbacks()->where('club_id', $club->id)->count()) {
//            return redirect()->route('student.club', $club->id)
//                ->with('fail', 'You can only send feedback once for this club.');
//        }

        abort_if(!$member, 404);
        $user->feedbacks()->create([
            'club_id'                => $club->id,
            'event_id'               => $request->event_id,
            'rating_registering'     => $request->input('rating_registering'),
            'rating_venue'           => $request->input('rating_venue'),
            'rating_timing'          => $request->input('rating_timing'),
            'rating_organization'    => $request->input('rating_organization'),
            'rating_topic'           => $request->input('rating_topic'),
            'rating_overall'         => $request->input('rating_overall'),
            'worked_well'            => $request->input('worked_well'),
            'improvements'           => $request->input('improvements'),
            'future_event_suggestions' => $request->input('future_event_suggestions'),
            'comment'                => $request->comment,
            'dateTime'               => now(),
            'admin_id'               => 1 // assuming admin_id is set to 1
        ]);
        return redirect()->route('student.club', $club->id)
            ->with('success', 'Your feedback has been sent. Thank you!');
    }
}
