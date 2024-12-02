@extends('student.master_app.app')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid " src="{{$club->avatar}}" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger text-center">{{Session::get('fail')}}</div>
                            @endif
                            <h1 class="h2">{{$club->club_name}}</h1>
                            <p class="h3 py-2">{{$club->mission_statement}}</p>
                            <p class="py-2">
                                @foreach(range(1,5) as $r)
								    <i class='fa fa-star {{$r <= $club->rating() ? "text-warning" : "text-secondary"}}' ></i>
								    @endforeach
                                <span class="list-inline-item text-dark">Rating {{round($club->rating(),2)}} | {{ $club->feedbacks->count() }} Feedbacks</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Club leader:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$club->clubLeader->club_leader_name}}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{$club->club_description}}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Memberships :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$club->memberships->count()}}</strong></p>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Events :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$club->events->count()}}</strong></p>
                                </li>
                            </ul>
                            @if(auth('students')->check())
                            @if($member = auth('students')->user()->memberships()->where('club_id', $club->id)->first())
                            <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg disabled" name="submit" value="addtocard" disabled><i class="fa fa-user"></i> {{ $member->status == 'active' ? 'Joined' : 'Your Request Pending...' }}</button>
                                    </div>
                                    <div class="col d-grid">
                                        <a href="{{route('student.suggestion', $club->id)}}" class="btn btn-primary btn-lg">
                                            <i class="fa fa-envelope"></i> Suggestion
                                        </a>
                                    </div>
{{--                                    @if(!auth('students')->user()->feedbacks()->where('club_id', $club->id)->count())--}}
                                    <div class="col d-grid">
                                        <a href="{{route('student.feedback', $club->id)}}" class="btn btn-warning btn-lg">
                                            <i class="fa fa-star"></i> Feedback
                                        </a>
                                    </div>
{{--                                    @endif--}}
                                </div>
                            @else
                            <form action="{{route('student.membership', $club->id)}}" method="post">
                                @csrf

                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard"><i class="fa fa-user"></i> Join Now</button>
                                    </div>
                                </div>
                            </form>
                            @endif

                            @else
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a class="btn btn-success btn-lg" href="{{route('student.login')}}">Login First</a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3 text-center">
                <h4>Club Events</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach($events as $event)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{url('student/assets/img/event.jpg')}}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="{{route('student.event', [$club->id,$event->id])}}"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                        <p class="text-center">
                    @foreach(range(1,5) as $r)
								    <i class='fa fa-star {{$r <= $event->rating() ? "text-warning" : "text-muted"}}' ></i>
								    @endforeach
                    </p>
                    <p class="text-center">
                            <a href="{{route('student.event', [$club->id,$event->id])}}" class="h3 text-center text-decoration-none">{{$event->event_name}}</a>
                    </p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>


        </div>
    </section>
    <!-- End Article -->

    <section class="container py-4">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Feedbacks.</h1>
            </div>
        </div>
        <div class="row">
            @foreach($club->feedbacks as $feedback)
                <div class="col-12 col-md-3 mt-3 text-center">
                    <!-- Student Avatar -->
                    <a href="#">
                        <img src="{{ $feedback->student?->avatar }}" class="rounded-circle img-fluid border" style="height: 75px; margin: auto; display: flex;">
                    </a>

                    <!-- Student Name -->
                    <h5 class="mt-3 mb-1">{{ $feedback->student?->student_name }}</h5>

                    <!-- Event Name -->
                    <h6 class="text-muted mb-3">{{ $feedback->event?->event_name }}</h6>

                    <!-- Average Rating Calculation -->
                    @php
                        $ratings = [
                            $feedback->rating_registering,
                            $feedback->rating_venue,
                            $feedback->rating_timing,
                            $feedback->rating_organization,
                            $feedback->rating_topic,
                            $feedback->rating_overall
                        ];
                        $filteredRatings = array_filter($ratings); // Filter out null values
                        $averageRating = count($filteredRatings) > 0 ? array_sum($filteredRatings) / count($filteredRatings) : 0;
                        $roundedRating = round($averageRating); // Round for displaying stars
                    @endphp

                        <!-- Display Average Rating -->
                    <p class="text-center">
                        @foreach(range(1, 5) as $r)
                            <i class="fa fa-star {{ $r <= $roundedRating ? 'text-warning' : 'text-muted' }}"></i>
                        @endforeach
                    </p>

                    <!-- Comment -->
{{--                    <p class="text-center">--}}
{{--                        <em>"{{ $feedback->comment }}"</em>--}}
{{--                    </p>--}}
                </div>
            @endforeach
        </div>


    </section>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick-theme.css')}}">
@endsection
@section('js')
  <script src="{{url('student/assets/js/slick.min.js')}}"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>

@endsection
