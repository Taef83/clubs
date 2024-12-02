@extends('student.master_app.app')

@section('content')



    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Login Options</h1>
                <p>
                    You can login as a student account, Or simply login as a club leader.
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-6 pb-5">
                <a href="{{route('student.login')}}" class="reg-link">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fa fa-user fa-lg"></i></div>
                        <h2 class="h5 mt-4 text-center">Login as a Student</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-6 pb-5">
                <a href="{{route('leader.login')}}" class="reg-link">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="fa fa-user fa-lg"></i></div>
                        <h2 class="h5 mt-4 text-center">Login as a Club leader</h2>
                    </div>
                </a>
            </div>

        </div>
    </section>
    <!-- End Section -->

@endsection