<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Event;
use App\Models\Membership;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class RPController extends Controller
{
    // Display a listing of the resource.
    public function memberships(Request $request)
    {
        $limit = $request->l ?? 10;
        $clubsWithMostMembers = Club::withCount('memberships')
                                ->orderBy('memberships_count', 'desc')
                                ->take($limit)
                                ->get();
        $handle = ['names' => [], 'numbers' => [], 'colors' => []];
        foreach ($clubsWithMostMembers as $key => $value) {
            $handle['names'][] = $value->club_name;
            $handle['numbers'][] = $value->memberships_count;
            $handle['colors'][] = random_color();
        }
        return view('control.rp.top_memberships', compact('clubsWithMostMembers', 'limit', 'handle'));
    }

    public function students(Request $request)
    {
        $limit = $request->l ?? 10;
        $topStudents = Student::withCount('attendances')
                                ->orderBy('attendances_count', 'desc')
                                ->take($limit)
                                ->get();
        $handle = ['names' => [], 'numbers' => [], 'colors' => []];
        foreach ($topStudents as $key => $value) {
            $handle['names'][] = $value->student_name;
            $handle['numbers'][] = $value->attendances_count;
            $handle['colors'][] = random_color();
        }
        return view('control.rp.top_students', compact('topStudents', 'limit', 'handle'));
    }
}
