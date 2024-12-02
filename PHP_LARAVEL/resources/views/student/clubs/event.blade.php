@extends('student.master_app.app')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 mt-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- Event Information -->
                            <div class="text-center">
                                <h1 class="h2">{{ optional($event->club)->club_name }}</h1>
                                <h2 class="h3">{{ $event->event_name }}</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered mt-3">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col">Event Date</th>
                                            <th scope="col">Event Time</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ date('Y-m-d', strtotime($event->start_date)) }}</td>
                                            <td>{{ date('H:i A', strtotime($event->start_time)) }} - {{ date('H:i A', strtotime($event->end_time)) }}</td>
                                            <td>{{ $event->event_description }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Student(s) Registered:</strong> {{ $event->registrations->count() }}</p>
                            </div>

                            <!-- Activity Selection -->
                            <form action="{{ route('student.event.action', [$club->id, $event->id]) }}" method="post">
                                @csrf

                                <!-- Activities Table -->
                                <h5 class="mt-4">Activities</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered mt-3">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col">Activity Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Participants</th>
                                            <th scope="col">Registered</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($event->activities as $activity)
                                            <tr>
                                                <td>{{ $activity->activity_name }}</td>
                                                <td>{{ $activity->activity_description }}</td>
                                                <td>{{ $activity->number_participants }}</td>
                                                <td>{{ $activity->registrations_count }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Activity Dropdown -->
                                <div class="form-group mt-4">
                                    <p>Please select an activity to complete registration:</p>
                                    <select name="activity_id" id="activity_id" class="form-control">
                                        <option value="">Choose an activity...</option>
                                        @foreach($event->activities as $activity)
                                            @if($activity->registrations_count < $activity->number_participants)
                                                <option value="{{ $activity->id }}">
                                                    {{ $activity->activity_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Registration Button -->
                                <div class="mt-4 d-grid">
                                    @if(!$user->registrations()->where('event_id', $event->id)->count())
                                        <button type="submit" class="btn btn-success btn-lg">Register Now</button>
                                    @else
                                        <button class="btn btn-success btn-lg disabled" disabled>Joined</button>
                                    @endif
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
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table thead th {
            font-weight: bold;
            text-align: center;
        }
        .table tbody td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection
