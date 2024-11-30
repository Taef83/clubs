<div class="row">
    <div class="col-md-6">
        <label for="club_id">Select Club</label>
        <select name="club_id" id="club_id" class="form-control {{ $errors->has('club_id') ? 'is-invalid' : '' }}">
            <option value="">-- Select Club --</option>
            @foreach(\App\Models\Club::all() as $club)
                <option value="{{ $club->club_id }}"
                    {{ (old('club_id', $item->club_id ?? '') == $club->club_id) ? 'selected' : '' }}>
                    {{ $club->club_name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('club_id'))
            <div class="invalid-feedback">{{ $errors->first('club_id') }}</div>
        @endif
    </div>


   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('club_leader_name') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_leader_name" class="form-label">Name</label>
         {!! Form::text('club_leader_name',  null,
         ['id' => 'club_leader_name',
         'placeholder' => 'Name',
         'class' => 'form-control' . ($errors->has('club_leader_name') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_leader_name'))
         <div class="form-control-feedback"> {{ $errors->first('club_leader_name') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('club_leader_email') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_leader_email" class="form-label">Email</label>
         {!! Form::email('club_leader_email',  null,
         ['id' => 'club_leader_email',
         'placeholder' => 'Email',
         'class' => 'form-control' . ($errors->has('club_leader_email') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_leader_email'))
         <div class="form-control-feedback"> {{ $errors->first('club_leader_email') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('club_leader_phone') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_leader_phone" class="form-label">Phone</label>
         {!! Form::text('club_leader_phone',  null,
         ['id' => 'club_leader_phone',
         'placeholder' => 'Phone',
         'class' => 'form-control' . ($errors->has('club_leader_phone') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_leader_phone'))
         <div class="form-control-feedback"> {{ $errors->first('club_leader_phone') }}</div>
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
      <div class="mb-3 {{ $errors->has('club_leader_image_profile') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_leader_image_profile" class="form-label">Profile Image</label>
         <input type="file" class="form-control" name="club_leader_image_profile" id="club_leader_image_profile">
         @if(isset($item))
         <img src="{{$item->avatar}}" style="width: 100%; height: 300px;" alt="">
         @endif
         @if($errors->has('club_leader_image_profile'))
         <div class="form-control-feedback"> {{ $errors->first('club_leader_image_profile') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>
