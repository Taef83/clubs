
@extends('student.master_app.app')

@section('content')

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-12">
            <h3>Reset Your Password</h3>

            </div>
        </div>
        <div class="row py-5">
            <form class="col-md-6 m-auto" action="{{route('student.reset.post')}}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <input type="hidden" name="email" value="{{request()->email}}">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="code">Code</label>
                        <input type="text" class="form-control mt-1 {{$errors->has('code') ? ' is-invalid' : ''}}" id="code" name="code" value="{{old('code')}}" placeholder="Code">
                        @if($errors->has('code'))
                        <div class="form-control-feedback"> {{ $errors->first('code') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <button type="submit" style="width: 100%;" class="btn btn-block btn-success btn-lg px-3">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection