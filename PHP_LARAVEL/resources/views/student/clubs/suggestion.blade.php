@extends('student.master_app.app')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <!-- col end -->
                <div class="col-lg-6 offset-lg-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2 text-center">{{$club->club_name}}</h1>

                            <form class="col-md-9 m-auto" action="{{route('student.suggestion.action', $club->id)}}" method="post" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="mb-3 {{ $errors->has('content') ? 'has-feedback has-error has-danger' : '' }}">
                                    <textarea class="form-control mt-1 {{$errors->has('content') ? ' is-invalid' : ''}}" id="content" name="content" placeholder="Say Whatever you want..." rows="8">{{old('content')}}</textarea>
                                        @if($errors->has('content'))
                                        <div class="form-control-feedback"> {{ $errors->first('content') }}</div>
                                        @endif
                                </div>
                                <div class="row">
                                    <div class="col text-end mt-2">
                                        <button type="submit" style="width: 100%;" class="btn btn-block btn-success btn-lg px-3">Send</button>
                                    </div>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('student/assets/css/slick-theme.css')}}">
@endsection

@section('js')
  <!-- Start Slider Script -->
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
    <!-- End Slider Script -->

@endsection