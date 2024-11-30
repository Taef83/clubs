

@extends('club_leader.master_app.app')
@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Feedback Details</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a>
                    <li class="breadcrumb-item active">Feedback Details</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div style="" class="card">
                <div style="    width: 58%;
    margin: auto;" class="card-body">
                    <h1 class="h2 text-center">{{ $item->club?->club_name }} Feedback</h1>
                    <p class="boxRate">
                        Event: <strong>{{ $item->event?->event_name }}</strong><br>
                        Thank you for attending! We appreciate your feedback to improve future events.
                    </p>
                    <p>
                        Rated By : {{ $item->student?->student_name }}
                    </p>
                    <div class="list-group mb-3">
                        <!-- Display individual ratings -->
                        @foreach(['Registering' => 'rating_registering', 'Venue' => 'rating_venue', 'Timing' => 'rating_timing', 'Organization' => 'rating_organization', 'Topic' => 'rating_topic', 'Overall' => 'rating_overall'] as $label => $field)
                            <div class="list-group-item">
                                <strong>{{ $label }}:</strong>
                                <span>
                                        @for($i = 1; $i <= 5; $i++)
                                        <i class="ft-star {{ $i <= $item->$field ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                    </span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Display open-ended answers -->
                    <div class="mb-3">
                        <strong>What worked well?</strong>
                        <p>{{ $item->worked_well ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>What could we do differently?</strong>
                        <p>{{ $item->improvements ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Suggestions for future events:</strong>
                        <p>{{ $item->future_event_suggestions ?? 'N/A' }}</p>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('leader.feedbacks.index') }}" class="btn btn-secondary mt-3">Back to Feedback
                            List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <style>
        .boxRate {
            background: #f2f2f2;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
@endsection



