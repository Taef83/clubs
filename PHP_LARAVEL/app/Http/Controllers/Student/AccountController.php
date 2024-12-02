<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Traits\UploadImages;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Cache;
use Mail;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
   use UploadImages;

   public function index()
   {
      $user = auth('students')->user();
      return view('student.account.data', compact('user'));
   }

   public function postProfile(Request $request)
    {
        $user = auth('students')->user();
        $data = $request->validate([
          'student_name'        => 'required|string|max:255',
          'student_email'       => 'required|string|email|max:255|unique:student,student_email,' . $user->id . ',student_id',
          'password'          => 'nullable|string|min:8',
          'student_phone'       => 'required|numeric|saudi_phone|unique:student,student_phone,' . $user->id . ',student_id',
          'image_profile'             => 'nullable|image',
          'student_major'             => 'required',
          'student_skills'            => 'nullable',
          'academic_number'       => 'required|numeric|unique:student,academic_number,' . $user->id . ',student_id',
      ]);
      $data['image_profile']  = $request->hasFile('image_profile') ? $this->upload($request->image_profile) : $user->image_profile;

      $data['student_password']       = $request->password ? Hash::make($request->password) : $user->student_password;

      $user->update($data);
      return redirect()->back()->with('success', 'Your profile has been updated');
    }

    public function certificates()
    {
      $certs = auth('students')->user()->certificates;
      return view('student.account.certs', compact('certs'));
    }

    public function certificate(Certificate $certificate)
    {
      return view('student.account.cert', compact('certificate'));
    }

}
