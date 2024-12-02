@extends('student.master_app.app')

@section('content')
<div class="container py-5">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    @forelse($certs as $cert)
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img style="margin:auto;" class="card-img rounded-0 img-fluid club-img" src="{{ url('cert.jpg') }}">
                            </div>
                            <div class="card-body text-center">
                                <a target="_blank" href="{{route('student.certificate', $cert->id)}}" class="h3 text-decoration-none text-center">{{$cert->event?->event_name}}</a>
                                <!-- <ul class="w-100 list-unstyled d-flex justify-content-between mb-0 text-center">
                                    <li>{{ $cert->issue_date }}</li>

                                </ul> -->

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center">No data yet.</div>
                    </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
