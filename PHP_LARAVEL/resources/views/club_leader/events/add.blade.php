@extends('club_leader.master_app.app')
@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Events</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('leader.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Events
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
                        <h4 class="card-title">Create Event</h4>
                    </div>
                    <div class="card-block">
                        <div class="card-body">
                            <div class="col-md-12">
                                {!!  Form::open(['route' => ['leader.events.store'],  'method'=> 'post', 'files' => true, 'class' => '']) !!}

                                @include('club_leader.events.inputs')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy68ZIfWzEX9z19gJ5e3wD298EeDoBiUE&libraries=places"></script>
    <script>
        function initialize() {

            const center = {lat: 50.064192, lng: -130.605469};
// Create a bounding box with sides ~10km away from the center point
            const defaultBounds = {
                north: center.lat + 0.1,
                south: center.lat - 0.1,
                east: center.lng + 0.1,
                west: center.lng - 0.1,
            };
            const input = document.getElementById("location");
            const options = {
                bounds: defaultBounds,
                componentRestrictions: {country: "SA"},
                fields: ["address_components", "geometry", "icon", "name"],
                strictBounds: false,
            };
            const autocomplete = new google.maps.places.Autocomplete(input, options);
        }


        $(document).ready(function () {

            google.maps.event.addDomListener(window, 'load', initialize);

        });



        function addActivity() {
            const activityContainer = document.getElementById('activities-container');
            const newActivity = document.createElement('div');
            newActivity.classList.add('activity-entry');
            newActivity.innerHTML = `
         <div class="mb-3">
            <label for="activity_name[]" class="form-label">Activity Name</label>
            <input type="text" name="activity_name[]" placeholder="Enter activity name" class="form-control">
         </div>
 <div class="mb-3">
            <label for="number_participants[]" class="form-label">Number Of Participants</label>
            <input type="number" name="number_participants[]" placeholder="Enter Number Of Participants" class="form-control">
         </div>
         <div class="mb-3">
            <label for="activity_description[]" class="form-label">Activity Description</label>
            <textarea name="activity_description[]" placeholder="Enter activity description" class="form-control" rows="2"></textarea>
         </div>
         <button type="button" class="btn btn-danger" onclick="removeActivity(this)">Remove</button>
      `;
            activityContainer.appendChild(newActivity);
        }

        function removeActivity(element) {
            element.parentElement.remove();
        }
    </script>
@endsection






