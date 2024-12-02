@extends('student.master_app.app')

@section('content')

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid imgSlider" src="{{url('student/assets/img/s1.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Clubs</b> Platform</h1>
                                <h3 class="h2">The best club you can find.</h3>
                                <p>
                                    You can join to any club you want after you browse the availabile clubs in the website.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid imgSlider" src="{{url('student/assets/img/s2.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Be The Winner</h1>
                                <h3 class="h2">With us you always win.</h3>
                                <p>
                                    Because we are the best platform you always win with us.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid imgSlider" src="{{url('student/assets/img/s3.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">You are safe</h1>
                                <h3 class="h2">With us you always safe. </h3>
                                <p>
                                    Here you are 100% safe and you data is totally safe.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">The best club leaders.</h1>
                <p>
                    There is some examples of club leaders that we are proude of.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach($leaders as $k => $leader)
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{route('student.leader', $leader->id)}}"><img src="{{$leader->avatar}}" class="rounded-circle imgLeader img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{ $leader->club_leader_name }}</h5>
                <p class="text-center"><a href="{{route('student.leader', $leader->id)}}" class="btn btn-success1">Go To The Profile</a></p>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section style="background-color: #fbfbfb !important;">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Top Clubs</h1>
                    <p>
                        The clubs that has members in it.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($clubs as $club)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card carddd h-100">
                        <a class="club-img-q" href="{{route('student.club', $club->id)}}">
                            <img src="{{$club->avatar}}" class="card-img-top club-img" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    @foreach(range(1,5) as $r)
								    <i class='fa fa-star {{$r <= $club->rating() ? "text-warning" : "text-muted"}}' ></i>
								    @endforeach
                                </li>
                                <!-- <li class="text-muted text-right">$240.00</li> -->
                            </ul>
                            <a href="{{route('student.club', $club->id)}}" class="h2 text-decoration-none text-dark">{{$club->club_name}}</a>
                            <p class="card-text">
                                {{ Str::limit($club->club_description, 40) }}
                            </p>
                            <p class="text-muted">Reviews ({{ $club->feedbacks->count() }})</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

@endsection
