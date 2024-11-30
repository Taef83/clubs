<?php

namespace App\Http\Controllers\ClubLeader;

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Club;
use App\Models\Event;
use App\Models\Feedback;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $items = Event::query();
        if ($request->c) {
            $items->where('club_id', $request->c);
        }
        $items = $items->whereHas('club', function ($q) {
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->latest('start_date')->paginate(30);
        return view('club_leader.events.index', compact('items'));
    }

    public function show(Event $event)
    {
        $item = $event;
        return view('club_leader.events.show', compact('item'));
    }

    public function create()
    {
        $clubs = Club::where('club_id', auth('leaders')->user()->club_id)->pluck('club_name', 'club_id');
        return view('club_leader.events.add', compact('clubs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'club_id'           => 'required|exists:club,club_id',
            'event_name'        => 'required',
            'event_description' => 'nullable',
            'start_date'        => 'required|date',
            'start_time'        => 'required',
            'end_time'          => 'required',
            'location'          => 'required',
            'activity_name.*'   => 'nullable|string|max:255',
            'activity_description.*' => 'nullable|string',
            'number_participants.*' => 'nullable|numeric',
        ]);

        $event = Event::create($data);

        // Save activities if they exist
        foreach ($request->activity_name as $index => $activityName) {
            if ($activityName) {
                $event->activities()->create([
                    'activity_name' => $activityName,
                    'activity_description' => $request->activity_description[$index] ?? '',
                    'number_participants' => $request->number_participants[$index] ?? '',
                ]);
            }
        }

        return redirect()->route('leader.events.index')->with('success', 'You have created an event successfully.');
    }

    public function edit(Event $event)
    {
        $item  = $event;
        $clubs = Club::where('club_id', auth('leaders')->user()->club_id)->pluck('club_name', 'club_id');
        return view('club_leader.events.edit', compact('clubs', 'item'));
    }

    public function update(Event $event, Request $request)
    {

        $data = $request->validate([
            'club_id'           => 'required|exists:club,club_id',
            'event_name'        => 'required',
            'event_description' => 'nullable',
            'start_date'        => 'required|date',
            'start_time'        => 'required',
            'end_time'          => 'required',
            'location'          => 'required',
            'activity_name.*'   => 'nullable|string|max:255',
            'activity_description.*' => 'nullable|string',
            'number_participants.*' => 'nullable|numeric',
        ]);

        $event->update($data);
        $event->activities()->delete();
        foreach ($request->activity_name as $index => $activityName) {
            if ($activityName) {
                $event->activities()->create([
                    'activity_name' => $activityName,
                    'activity_description' => $request->activity_description[$index] ?? '',
                    'number_participants' => $request->number_participants[$index] ?? '',
                ]);
            }
        }

        return redirect()->route('leader.events.index')->with('success', 'You have updated the event successfully.');
    }

    public function destroy(Event $event)
    {
        $event->activities()->delete();
        $event->delete();
        return redirect()->route('leader.events.index')->with('success', 'You have delete item from database successfully.');
    }

    public function attend(Event $event)
    {
        return view('club_leader.events.attend', compact('event'));
    }
    public function attendAction(Event $event, Request $request)
    {
        foreach ($request->attend as $key => $value) {
            $attend = $event->attendances()->where('student_id', $value['student'])->first();
            $stutus = isset($value['status']) && @$value['status'] == 1 ? 'present' : 'absence';
            $cert = Certificate::where('student_id', $value['student'])->where('event_id', $event->id)->first();
            if ($stutus == 'present' && !$cert) {
                Certificate::create([
                    'event_id'=> $event->id,
                    'student_id' => $value['student'],
                    'issue_date'=> now(),
                ]);
            }
            if(!$attend){
                $attend = $event->attendances()->create([
                    'student_id' => $value['student'],
                    'attended_time' => $value['time'],
                    'attendance_status' => $stutus
                ]);


            } else {
                $attend->update([
                    'attended_time' => $value['time'],
                    'attendance_status' => $stutus
                ]);
            }
        }
        return redirect()->back()->with('success', 'The Attendace has been saved');
    }
}
