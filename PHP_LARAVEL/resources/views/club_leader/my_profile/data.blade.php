@extends('club_leader.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Profile</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Profile
                  </li>
                </ol>
              </div>
            </div>
          </div>
@endsection

@section('content')

<section class="basic-inputs">
  <div class="row match-height">
   <div class="col-xl-12 col-lg-6 col-md-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Edit Profile</h4>
         </div>
         <div class="card-block">
            <div class="card-body">
                 <div class="col-md-12">
				  {!!  Form::open(['route' => ['leader.profile.post'],  'method'=> 'post', 'files' => true, 'class' => '']) !!}
                  <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="name" class="form-label">Name</label>
                            {!! Form::text('name',  $user->club_leader_name,
                            ['id' => 'name',
                            'placeholder' => 'Name',
                            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('name'))
                            <div class="form-control-feedback"> {{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="email" class="form-label">Email</label>
                            {!! Form::email('email',  $user->club_leader_email,
                            ['id' => 'email',
                            'placeholder' => 'Email',
                            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('email'))
                            <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 {{ $errors->has('phone') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="phone" class="form-label">Phone</label>
                            {!! Form::text('phone',  $user->club_leader_phone,
                            ['id' => 'phone',
                            'placeholder' => 'Phone',
                            'class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('phone'))
                            <div class="form-control-feedback"> {{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="password" class="form-label">Password</label>
                            {!! Form::password('password',
                            ['id' => 'password',
                            'placeholder' => 'Password',
                            'autocomplete' => 'new-password',
                            'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('password'))
                            <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 {{ $errors->has('image') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="club_leader_image_profile" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" name="image" id="club_leader_image_profile">
                            @if(isset($user))
                            <img src="{{$user->avatar}}" style="width: 100%; height: 150px;" alt="">
                            @endif
                            @if($errors->has('image'))
                            <div class="form-control-feedback"> {{ $errors->first('image') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-success">
                                Save <i class='bx bx-save'></i>
                            </button>
                    </div>
                    </div>
                  {!! Form::close() !!}
                 </div>
            </div>
         </div>
      </div>
   </div>
  </div>
</section>

@endsection










