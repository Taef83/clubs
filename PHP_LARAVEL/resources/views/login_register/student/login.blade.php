
@extends('student.master_app.app')

@section('content')

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-12">
            <h3>Login to your account</h3>

            </div>
        </div>
        <div class="row py-5">
            <form class="col-md-6 m-auto" action="{{route('student.login.post')}}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1 {{$errors->has('email') ? ' is-invalid' : ''}}" id="email" name="email" value="{{old('email')}}" placeholder="StudentEmail">
                        @if($errors->has('email'))
                        <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-12 mb-3 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                        <label for="inputname">Password</label>
                        <input type="password" class="form-control mt-1 {{$errors->has('password') ? ' is-invalid' : ''}}" id="name" name="password"  placeholder="Password">
                        @if($errors->has('student_name'))
                        <div class="form-control-feedback"> {{ $errors->first('student_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-12 mb-3">
                       <a href="{{route('student.forget')}}">Forget Password?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <button type="submit" style="width: 100%;" class="btn btn-block btn-success btn-lg px-3">Login Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection