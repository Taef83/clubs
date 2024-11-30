@push('css')
    <style>
        .activity-entry{
            border: 1px solid #b2b2b2;
            padding: 15px;
            margin: 29px;
            border-radius: 10px;
        }
    </style>
@endpush
<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('event_name') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_name" class="form-label">Name</label>
         {!! Form::text('event_name',  null,
         ['id' => 'event_name',
         'placeholder' => 'Name',
         'class' => 'form-control' . ($errors->has('event_name') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('event_name'))
         <div class="form-control-feedback"> {{ $errors->first('event_name') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('club_id') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="club_id" class="form-label">Club</label>
         {!! Form::select('club_id', $clubs, null,
         ['id' => 'club_id',
         'class' => 'form-control' . ($errors->has('club_id') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('club_id'))
         <div class="form-control-feedback"> {{ $errors->first('club_id') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-12">
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
      <div class="mb-3 {{ $errors->has('event_description') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="event_description" class="form-label">Description</label>
         {!! Form::textarea('event_description', null,
         ['id' => 'event_description',
         'placeholder' => 'Description',
         'class' => 'form-control' . ($errors->has('event_description') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('event_description'))
         <div class="form-control-feedback"> {{ $errors->first('event_description') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('start_date') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="start_date" class="form-label">Start Date</label>
         {!! Form::date('start_date',  null,
         ['id' => 'start_date',
         'class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('start_date'))
         <div class="form-control-feedback"> {{ $errors->first('start_date') }}</div>
         @endif
      </div>
   </div>


    <div class="col-md-6">
        <!-- Start Time -->
        <div class="mb-3 {{ $errors->has('start_time') ? 'has-feedback has-error has-danger' : '' }}">
            <label for="start_time" class="form-label">Start Time</label>
            {!! Form::time('start_time', null, [
               'id' => 'start_time',
               'class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''),
            ]) !!}
            @if($errors->has('start_time'))
                <div class="form-control-feedback"> {{ $errors->first('start_time') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <!-- End Time -->
        <div class="mb-3 {{ $errors->has('end_time') ? 'has-feedback has-error has-danger' : '' }}">
            <label for="end_time" class="form-label">End Time</label>
            {!! Form::time('end_time', null, [
               'id' => 'end_time',
               'class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''),
            ]) !!}
            @if($errors->has('end_time'))
                <div class="form-control-feedback"> {{ $errors->first('end_time') }}</div>
            @endif
        </div>
    </div>

    <!-- Activities Section -->
    <div class="col-md-12">
        <h5 class="mt-4">Activities</h5>
        <div id="activities-container">
            @if(old('activity_name'))
                @foreach(old('activity_name') as $index => $activityName)
                    <div class="activity-entry">
                        <div class="mb-3">
                            <label for="activity_name[]" class="form-label">Activity Name</label>
                            {!! Form::text("activity_name[]", $activityName, [
                               'placeholder' => 'Enter activity name',
                               'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            <label for="number_participants[]" class="form-label">Number Of Participants</label>
                            {!! Form::number("number_participants[]", old('number_participants')[$index], [
                               'placeholder' => 'Enter number of participants',
                               'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            <label for="activity_description[]" class="form-label">Activity Description</label>
                            {!! Form::textarea("activity_description[]", old('activity_description')[$index], [
                               'placeholder' => 'Enter activity description',
                               'class' => 'form-control',
                               'rows' => 2
                            ]) !!}
                        </div>
                    </div>
                @endforeach
            @elseif(isset($item->activities) && $item->activities->isNotEmpty())
                @foreach($item->activities as $activity)
                    <div class="activity-entry">
                        <div class="mb-3">
                            <label for="activity_name[]" class="form-label">Activity Name</label>
                            {!! Form::text("activity_name[]", $activity->activity_name, [
                               'placeholder' => 'Enter activity name',
                               'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            <label for="number_participants[]" class="form-label">Number Of Participants</label>
                            {!! Form::number("number_participants[]", $activity->number_participants, [
                               'placeholder' => 'Enter number of participants',
                               'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            <label for="activity_description[]" class="form-label">Activity Description</label>
                            {!! Form::textarea("activity_description[]", $activity->activity_description, [
                               'placeholder' => 'Enter activity description',
                               'class' => 'form-control',
                               'rows' => 2
                            ]) !!}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="activity-entry">
                    <div class="mb-3">
                        <label for="activity_name[]" class="form-label">Activity Name</label>
                        {!! Form::text("activity_name[]", null, [
                           'placeholder' => 'Enter activity name',
                           'class' => 'form-control'
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        <label for="number_participants[]" class="form-label">Number Of Participants</label>
                        {!! Form::number("number_participants[]", null, [
                           'placeholder' => 'Enter number of participants',
                           'class' => 'form-control'
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        <label for="activity_description[]" class="form-label">Activity Description</label>
                        {!! Form::textarea("activity_description[]", null, [
                           'placeholder' => 'Enter activity description',
                           'class' => 'form-control',
                           'rows' => 2
                        ]) !!}
                    </div>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary" onclick="addActivity()">Add More Activity</button>
    </div>
   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>
