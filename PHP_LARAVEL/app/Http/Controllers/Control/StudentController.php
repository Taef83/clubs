<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class StudentController extends Controller
{
    use UploadImages;
    // Display a listing of the resource.
    public function index()
    {
        $items = Student::paginate(30);
        return view('control.students.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('control.students.add');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->validate([
                'student_name'              => 'required|string|max:255',
                'student_email'             => 'required|string|email|max:255|unique:student,student_email',
                'password'                  => 'required|string|min:8',
                'student_phone'             => 'required|numeric|saudi_phone|unique:student,student_phone',
                'image_profile'             => 'nullable|image',
                'student_major'             => 'required',
                'student_skills'            => 'nullable',
                'academic_number'         => 'required|numeric|unique:student,academic_number'

            ]);

        $data['image_profile']          = $request->hasFile('image_profile') ? $this->upload($request->image_profile) : null;
        $data['student_password']       = Hash::make($request->password);


        Student::create($data);

        return redirect()->route('control.students.index')->with('success', 'You have created item in database successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Student $student)
    {
        $item = $student;
        return view('control.students.edit', compact('student', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
                'student_name'        => 'required|string|max:255',
                'student_email'       => 'required|string|email|max:255|unique:student,student_email,' . $student->id . ',student_id',
                'password'          => 'nullable|string|min:8',
                'student_phone'       => 'required|numeric|saudi_phone|unique:student,student_phone,' . $student->id . ',student_id',
                'image_profile'             => 'nullable|image',
                'student_major'             => 'required',
                'student_skills'            => 'nullable',
                'academic_number'       => 'required|numeric|unique:student,academic_number,' . $student->id . ',student_id',

            ]);
        $data['image_profile']  = $request->hasFile('image_profile') ? $this->upload($request->image_profile) : $student->image_profile;

        $data['student_password']       = $request->password ? Hash::make($request->password) : $student->student_password;

        $student->update($data);

        return redirect()->route('control.students.index')->with('success', 'You have updated item in database successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('control.students.index')->with('success', 'You have delete item from database successfully.');
    }
}
