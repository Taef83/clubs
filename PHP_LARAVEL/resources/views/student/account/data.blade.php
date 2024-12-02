@extends('student.master_app.app')

@section('content')

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-12">
                <h3>Update You Account Data</h3>
            </div>
            @if(Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('success')}}</div>
            </div>
            @endif
        </div>
        <div class="row py-5">
            <form class="col-md-9 m-auto" action="{{route('student.account.action')}}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3 {{ $errors->has('student_name') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1 {{$errors->has('student_name') ? ' is-invalid' : ''}}" id="name" name="student_name" value="{{old('student_name') ?? $user->student_name}}" placeholder="Student Name">
                        @if($errors->has('student_name'))
                        <div class="form-control-feedback"> {{ $errors->first('student_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1 {{$errors->has('student_email') ? ' is-invalid' : ''}}" id="email" name="student_email" value="{{old('student_email')  ?? $user->student_email}}" placeholder="StudentEmail">
                        @if($errors->has('student_email'))
                        <div class="form-control-feedback"> {{ $errors->first('student_email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3 {{ $errors->has('student_phone') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputname">Phone</label>
                        <input type="text" class="form-control mt-1 {{$errors->has('student_phone') ? ' is-invalid' : ''}}" id="student_phone" name="student_phone" value="{{old('student_phone')  ?? $user->student_phone}}" placeholder="Student Phone">
                        @if($errors->has('student_phone'))
                        <div class="form-control-feedback"> {{ $errors->first('student_phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6 mb-3 {{ $errors->has('academic_number') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputname">Academic Number</label>
                        <input type="text" class="form-control mt-1 {{$errors->has('academic_number') ? ' is-invalid' : ''}}" id="academic_number" name="academic_number" value="{{old('academic_number') ?? $user->academic_number}}" placeholder="academic number">
                        @if($errors->has('academic_number'))
                        <div class="form-control-feedback"> {{ $errors->first('academic_number') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 mb-3 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputname">Password</label>
                        <input type="password" class="form-control mt-1 {{$errors->has('password') ? ' is-invalid' : ''}}" id="password" name="password" placeholder="Password ">
                        @if($errors->has('password'))
                        <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-6 mb-3 {{ $errors->has('student_major') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputemail">Major</label>
                        {!! Form::select('student_major',trans('main.student_majors'),  $user->student_major,
                        ['id' => 'student_major',
                        'placeholder' => 'Major',
                        'class' => 'form-control' . ($errors->has('student_major') ? ' is-invalid' : ''),
                        ]
                        );
                        !!}
                        @if($errors->has('student_major'))
                        <div class="form-control-feedback"> {{ $errors->first('student_major') }}</div>
                        @endif
                    </div>


                </div>

                <div class="mb-3 {{ $errors->has('image_profile') ? 'has-feedback has-error has-danger' : '' }}">
                    <label for="inputsubject">Image Profile</label>
                    <input type="file" class="form-control mt-1 {{$errors->has('image_profile') ? ' is-invalid' : ''}}" id="image_profile" name="image_profile">
                    <img src="{{$user->avatar}}" style="width: 200px; height: 200px" alt="">
                        @if($errors->has('image_profile'))
                        <div class="form-control-feedback"> {{ $errors->first('image_profile') }}</div>
                        @endif
                </div>

                <div class="mb-3 {{ $errors->has('student_skills') ? 'has-feedback has-error has-danger' : '' }}">
                    <label for="inputmessage">Skills</label>
                    <textarea class="form-control mt-1 {{$errors->has('student_skills') ? ' is-invalid' : ''}}" id="student_skills" name="student_skills" placeholder="Student Skills" rows="8">{{old('student_skills')  ?? $user->student_skills}}</textarea>
                        @if($errors->has('student_skills'))
                        <div class="form-control-feedback"> {{ $errors->first('student_skills') }}</div>
                        @endif
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection