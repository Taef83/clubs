<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Club;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class CertificateController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $items = Certificate::query();
        if($request->c){
            $items->where('event_id', $request->c);
        }
        $items = $items->whereHas('event', function($q){
            return $q->whereHas('club', function($qq){
                return $qq->where('club_id', auth('leaders')->user()->club_id);
            });
        })->paginate(60);
        return view('club_leader.cert.index', compact('items'));
    }

    public function create(Request $request)
    {
        $events = Event::whereHas('club', function ($q) {
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->pluck('event_name', 'event_id');

        $students = [];
//        if ($request->has('event_id')) {
//            $students = Student::whereHas('registrations.event', function ($q) use ($request) {
//                return $q->where('event_id', $request->event_id);
//            })->pluck('student_name', 'student_id');
//        }

        if ($request->has('event_id')) {
            $students = Student::whereHas('attendances', function ($q) use ($request) {
                $q->where('event_id', $request->event_id)
                    ->where('attendance_status', 'present'); // Include only accepted attendees
            })->whereDoesntHave('certificates', function ($q) use ($request) {
                $q->where('event_id', $request->event_id);
            })->pluck('student_name', 'student_id');
        }
        return view('club_leader.cert.add', compact('events', 'students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id'           => 'required|exists:event,event_id',
            'student_id'         => 'required|exists:student,student_id',
            'issue_date'        => 'required|date',
        ]);
        Certificate::create($data);
        return redirect()->route('leader.certificates.index')->with('success', 'You have create item to database successfully.');
    }

    public function edit(Certificate $certificate)
    {
        $item  = $certificate;
        $events = Event::whereHas('club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->pluck('event_name', 'event_id');
        $students = Student::whereHas('registrations.event.club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->pluck('student_name', 'student_id');
        return view('club_leader.cert.edit', compact('events', 'students', 'item'));
    }

    public function update(Certificate $certificate, Request $request)
    {
        $data = $request->validate([
            'event_id'           => 'required|exists:event,event_id',
            'student_id'         => 'required|exists:student,student_id',
            'issue_date'        => 'required|date',
            'certificate_description' => 'required',
        ]);
        $certificate->update($data);
        return redirect()->route('leader.certificates.index')->with('success', 'You have update item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('leader.certificates.index')->with('success', 'You have delete item from database successfully.');
    }

}
