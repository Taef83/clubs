<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('student_name') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="student_name" class="form-label">Name</label>
         {!! Form::text('student_name',  null,
         ['id' => 'student_name',
         'placeholder' => 'Name',
         'class' => 'form-control' . ($errors->has('student_name') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('student_name'))
         <div class="form-control-feedback"> {{ $errors->first('student_name') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('student_email') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="student_email" class="form-label">Email</label>
         {!! Form::email('student_email',  null,
         ['id' => 'student_email',
         'placeholder' => 'Email',
         'class' => 'form-control' . ($errors->has('student_email') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('student_email'))
         <div class="form-control-feedback"> {{ $errors->first('student_email') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('student_phone') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="student_phone" class="form-label">Phone</label>
         {!! Form::text('student_phone',  null,
         ['id' => 'student_phone',
         'placeholder' => 'Phone',
         'class' => 'form-control' . ($errors->has('student_phone') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('student_phone'))
         <div class="form-control-feedback"> {{ $errors->first('student_phone') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="password" class="form-label">Password</label>
         {!! Form::password('password',
         ['id' => 'password',
         'placeholder' => 'Password',
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
      <div class="mb-3 {{ $errors->has('academic_number') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="academic_number" class="form-label">Student ID</label>
         {!! Form::text('academic_number',  null,
         ['id' => 'academic_number',
         'placeholder' => 'Student ID',
         'class' => 'form-control' . ($errors->has('academic_number') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('academic_number'))
         <div class="form-control-feedback"> {{ $errors->first('academic_number') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('student_major') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="student_major" class="form-label">Major</label>
         {!! Form::select('student_major',trans('main.student_majors'),  null,
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

   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('image_profile') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="image_profile" class="form-label">Profile Image</label>
         <input type="file" class="form-control" name="image_profile" id="image_profile">
         @if(isset($item))
         <img src="{{$item->avatar}}" style="width: 100%; height: 300px;" alt="">
         @endif
         @if($errors->has('image_profile'))
         <div class="form-control-feedback"> {{ $errors->first('image_profile') }}</div>
         @endif
      </div>
   </div>



   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('student_skills') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="student_skills" class="form-label">Skills</label>
         {!! Form::textarea('student_skills',  null,
         ['id' => 'student_skills',
         'placeholder' => 'Skills',
         'class' => 'form-control' . ($errors->has('student_skills') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('student_skills'))
         <div class="form-control-feedback"> {{ $errors->first('student_skills') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>
