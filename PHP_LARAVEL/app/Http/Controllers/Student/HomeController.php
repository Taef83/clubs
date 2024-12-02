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

class HomeController extends Controller
{
   public function index()
   {
      $leaders = ClubLeader::whereHas('clubs')->take(3)->latest('club_id')->get();
      $clubs   = Club::withCount('memberships')
      ->orderBy('memberships_count', 'desc')
      ->take(3)
      ->get();

      return view('student.main.home', compact('clubs', 'leaders'));
   }

   public function about()
   {
      return view('student.main.about_us');
   }

   public function contact()
   {
      return view('student.main.contact_us');
   }

   public function register()
   {
      return view('student.main.pre_register');
   }

   public function login()
   {
      return view('student.main.pre_login');
   }
}
