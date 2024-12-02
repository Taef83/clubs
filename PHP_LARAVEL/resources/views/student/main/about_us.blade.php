@extends('student.master_app.app')

@section('content')


<section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-6 text-white">
                    <h1>About Us</h1>
                    <p>
                        We are a platform that provide service for student and clubs together, we are hosting clubs in our system to give students options to choose.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{url('about.webp')}}" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                <p>
                    Our Services provide seamless access to a centralized platform for managing and promoting student clubs. We offer tools for event planning, member tracking, and communication to enhance club engagement. With a focus on simplifying club operations, we help students easily join, participate, and stay informed about their favorite activities.







                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-home fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Hosting Clubs</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Register in Club</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-users"></i></div>
                    <h2 class="h5 mt-4 text-center">Register in Event</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

@endsection
