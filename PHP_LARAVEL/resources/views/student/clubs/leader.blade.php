@extends('student.master_app.app')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid club-img" src="{{$leader->avatar}}" alt="Card image cap" id="product-detail">
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
                            <h1 class="h2">{{$leader->club_leader_name}}</h1>
                            <p class="h3 py-2">{{$leader->club_leader_email}}</p>
                            <p class="py-2">
                                <span class="list-inline-item text-dark">Leader for {{$leader->clubs->count()}} Clubs</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->


@endsection

@section('css')

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick-theme.css')}}">
@endsection

@section('js')
  <!-- Start Slider Script -->
 
@endsection