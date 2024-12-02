@extends('student.master_app.app')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Event Selection at the Top -->


                            <!-- Introductory Message -->
                            <h1 class="h2 text-center">{{ $club->club_name }}</h1>
                            <p class="boxRate">
                                Thank you for attending the <span id="eventName">----------------</span> event!<br>
                                We are committed to providing you with the best experience possible, so we welcome your comments.
                                We will use this questionnaire to make future events better, so please take the time to fill out this questionnaire. Thank you.
                            </p>
                            <strong style="margin-bottom: 14px;" class=" font-weight-bold">Please rate the quality of the following:</strong>

                            <!-- Feedback Form -->
                            <form class="col-md-9 m-auto" action="{{ route('student.feedback.action', $club->id) }}" method="post" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="mb-3 mt-4">
                                    <select required name="event_id" id="event_id" class="form-control @error('event_id') is-invalid @enderror" onchange="setEventName()">
                                        <option value="">Select Event</option>
                                        @foreach($events as $event)
                                            <option value="{{ $event->id }}" data-name="{{ $event->event_name }}">{{ $event->event_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('event_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Star Rating Questions -->
                                @foreach (['Registering', 'Venue', 'Timing', 'Organization', 'Topic', 'Overall'] as $aspect)
                                    <div class="mb-3 ">
                                        <label style="    margin-bottom: 17px;" class="mt-2 text-left">{{ $aspect }}</label>

                                        <div class="star-rating" data-name="rating_{{ strtolower($aspect) }}">

                                        @for ($i = 1; $i <= 5; $i++)
                                                <span class="fa fa-star" data-value="{{ $i }}"></span>
                                            @endfor
                                            <input type="hidden" name="rating_{{ strtolower($aspect) }}" value="0" class="rating-value">
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach

                                <!-- Open-Ended Questions -->
                                <div class="mb-3">
                                    <label>What worked well?</label>
                                    <textarea name="worked_well" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>What could we do differently?</label>
                                    <textarea name="improvements" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Suggest any events you would like to see in the future</label>
                                    <textarea name="future_event_suggestions" class="form-control" rows="3"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success btn-lg px-5">Send Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
@endsection

@section('css')
    <style>
        .boxRate {
            background: #f2f2f2;
            padding: 15px;
            border-radius: 10px;
        }
        .star-rating {
            display: flex;
            justify-content: space-evenly;
        }
        .star-rating .fa-star {
            font-size: 1.5em;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-rating .fa-star.selected {
            color: #FFD700; /* Gold color for selected stars */
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Function to update the event name in the introductory message
        function setEventName() {
            const eventDropdown = document.getElementById('event_id');
            const selectedEvent = eventDropdown.options[eventDropdown.selectedIndex];
            const eventName = selectedEvent.getAttribute('data-name') || '----------------';
            document.getElementById('eventName').innerText = eventName;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.star-rating').forEach(function(starRating) {
                console.log(starRating, 'dddddddddddddd')
                let ratingValueInput = starRating.querySelector('.rating-value');

                // Skip this starRating block if ratingValueInput is not found
                if (!ratingValueInput) return;

                let stars = starRating.querySelectorAll('.fa-star');

                stars.forEach(function(star) {
                    star.addEventListener('click', function() {
                        let value = this.getAttribute('data-value');

                        // Check if ratingValueInput exists before setting its value
                        if (ratingValueInput) {
                            ratingValueInput.value = value;
                        }

                        // Highlight the stars up to the clicked one
                        stars.forEach(function(s, index) {
                            s.classList.toggle('selected', index < value);
                        });
                    });

                    // Highlight stars on hover
                    star.addEventListener('mouseover', function() {
                        let value = this.getAttribute('data-value');
                        stars.forEach(function(s, index) {
                            s.classList.toggle('selected', index < value);
                        });
                    });

                    // Reset stars when mouse leaves the rating group
                    starRating.addEventListener('mouseleave', function() {
                        let value = ratingValueInput ? ratingValueInput.value : 0;
                        stars.forEach(function(s, index) {
                            s.classList.toggle('selected', index < value);
                        });
                    });
                });
            });
        });

    </script>
@endsection
