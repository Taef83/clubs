<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('admin_name') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="admin_name" class="form-label">Name</label>
         {!! Form::text('admin_name',  null,
         ['id' => 'admin_name',
         'placeholder' => 'Name',
         'class' => 'form-control' . ($errors->has('admin_name') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('admin_name'))
         <div class="form-control-feedback"> {{ $errors->first('admin_name') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('admin_email') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="admin_email" class="form-label">Email</label>
         {!! Form::email('admin_email',  null,
         ['id' => 'admin_email',
         'placeholder' => 'Email',
         'class' => 'form-control' . ($errors->has('admin_email') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('admin_email'))
         <div class="form-control-feedback"> {{ $errors->first('admin_email') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('admin_phone') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="admin_phone" class="form-label">Phone</label>
         {!! Form::text('admin_phone',  null,
         ['id' => 'admin_phone',
         'placeholder' => 'Phone',
         'class' => 'form-control' . ($errors->has('admin_phone') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('admin_phone'))
         <div class="form-control-feedback"> {{ $errors->first('admin_phone') }}</div>
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
   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>