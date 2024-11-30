<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('club_name') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_name" class="form-label">Name</label>
         {!! Form::text('club_name',  null,
         ['id' => 'club_name',
         'placeholder' => 'Name',
         'class' => 'form-control' . ($errors->has('club_name') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_name'))
         <div class="form-control-feedback"> {{ $errors->first('club_name') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('mission_statement') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="mission_statement" class="form-label">Mission Statement</label>
         {!! Form::text('mission_statement',  null,
         ['id' => 'mission_statement',
         'placeholder' => 'Mission Statement',
         'class' => 'form-control' . ($errors->has('mission_statement') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('mission_statement'))
         <div class="form-control-feedback"> {{ $errors->first('mission_statement') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('location') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="location" class="form-label">location</label>
         {!! Form::text('location',  null,
         ['id' => 'location',
         'placeholder' => 'Location',
         'class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('location'))
         <div class="form-control-feedback"> {{ $errors->first('location') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('club_description') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_description" class="form-label">Description</label>
         {!! Form::textarea('club_description', null,
         ['id' => 'club_description',
         'placeholder' => 'Leader',
         'class' => 'form-control' . ($errors->has('club_description') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_description'))
         <div class="form-control-feedback"> {{ $errors->first('club_description') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('club_image') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_image" class="form-label">Profile Image</label>
         <input type="file" class="form-control" name="club_image" id="club_image">
         @if(isset($item))
         <img src="{{$item->avatar}}" style="width: 100%; height: 300px;" alt="">
         @endif
         @if($errors->has('club_image'))
         <div class="form-control-feedback"> {{ $errors->first('club_image') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>
