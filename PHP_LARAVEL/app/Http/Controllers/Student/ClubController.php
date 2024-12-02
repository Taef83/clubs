<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ClubLeader;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
   public function index(Club $club)
   {

       $events   = $club->events()->orderBy('start_date', 'asc')->get();
      return view('student.clubs.profile', compact('club', 'events'));
   }

    public function list(Request $request)
    {
        $clubs = Club::whereHas('clubLeader');

        // Search by name
        if ($request->w) {
            $clubs = $clubs->where('club_name', 'like', '%' . $request->w . '%');
        }

        // Search by location
        if ($request->location) {
            $clubs = $clubs->where('location', 'like', '%' . $request->location . '%');
        }

        // Search by minimum rating
        if ($request->rating) {
            $clubs = $clubs->whereHas('feedbacks', function ($query) use ($request) {
                $query->select('club_id')
                    ->groupBy('club_id')
                    ->havingRaw('AVG(rating) >= ?', [$request->rating]);
            });
        }


        $clubs = $clubs->paginate(53);
        return view('student.clubs.list', compact('clubs'));
    }


   public function leader(ClubLeader $leader)
   {
      return view('student.clubs.leader', compact('leader'));
   }

}
