@extends('club_leader.master_app.app')

@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Club Dashboard</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Club Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <h5>Certificates</h5>
                    <h3>{{ $stats['certs'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <h5>Memberships</h5>
                    <h3>{{ $stats['mems'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white">
                <div class="card-body text-center">
                    <h5>Events</h5>
                    <h3>{{ $stats['events'] }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <div class="card-body">
                    @if($club)
                        <!-- Club Image -->
                        <div class="text-center mb-4">
                            <img src="{{ $club->avatar }}" alt="{{ $club->club_name }}" class="img-fluid rounded-circle" style="max-height: 150px; border: 3px solid #007bff;">
                        </div>

                        <!-- Club Basic Information -->
                        <div class="list-group mb-4 shadow-sm">
                            <div class="list-group-item">
                                <strong>Club Name:</strong> {{ $club->club_name }}
                            </div>
                            <div class="list-group-item">
                                <strong>Mission Statement:</strong> {{ $club->mission_statement }}
                            </div>
                            <div class="list-group-item">
                                <strong>Description:</strong> {{ $club->club_description }}
                            </div>
                            <div class="list-group-item">
                                <strong>Location:</strong> {{ $club->location }}
                            </div>
                            <div class="list-group-item">
                                <strong>Overall Rating:</strong> {{ $club->rating() }}
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="row">
                            <!-- Certificates Chart -->
                            <div class="col-md-4">
                                <div class="card shadow-sm">
                                    <div style="    background: #7b7fc2 !important;" class="card-header bg-info text-white">
                                        <h5 class="text-white">Certificates Over Time</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="certificatesChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Events Chart -->
                            <div class="col-md-4">
                                <div class="card shadow-sm">
                                    <div style="    background: #7b7fc2 !important;" class="card-header bg-success text-white">
                                        <h5 class="text-white">Events Over Time</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="eventsChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Feedbacks Chart -->
                            <div class="col-md-4">
                                <div class="card shadow-sm">
                                    <div style="    background: #7b7fc2 !important;" class="card-header bg-warning text-dark">
                                        <h5 class="text-white">Feedbacks Over Time</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="feedbacksChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <p class="text-center">No club data found for this leader.</p>
                    @endif
                </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card-header {
            font-weight: bold;
            font-size: 1.1em;
        }
        .content-header-title {
            font-size: 1.5em;
            font-weight: 600;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <script>
        // Certificates Over Time Chart
        var certificatesCtx = document.getElementById('certificatesChart').getContext('2d');
        var certificatesChart = new Chart(certificatesCtx, {
            type: 'bar',
            data: {
                labels: @json($certificatesByMonth->keys()), // Months as labels
                datasets: [{
                    label: 'Certificates',
                    data: @json($certificatesByMonth->values()), // Certificate counts as data
                    backgroundColor: 'rgba(66, 165, 245, 0.2)',
                    borderColor: '#1E88E5',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        type: 'time',
                        time: {
                            unit: 'month',
                            tooltipFormat: 'MMM yyyy',
                        }
                    }
                }
            }
        });

        // Events Over Time Chart
        var eventsCtx = document.getElementById('eventsChart').getContext('2d');
        var eventsChart = new Chart(eventsCtx, {
            type: 'line',
            data: {
                labels: @json($eventsByMonth->keys()), // Months as labels
                datasets: [{
                    label: 'Events',
                    data: @json($eventsByMonth->values()), // Event counts as data
                    backgroundColor: 'rgba(102, 187, 106, 0.2)',
                    borderColor: '#43A047',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        type: 'time',
                        time: {
                            unit: 'month',
                            tooltipFormat: 'MMM yyyy',
                        }
                    }
                }
            }
        });

        // Feedbacks Over Time Chart
        var feedbacksCtx = document.getElementById('feedbacksChart').getContext('2d');
        var feedbacksChart = new Chart(feedbacksCtx, {
            type: 'pie',
            data: {
                labels: @json($feedbacksByMonth->keys()), // Months as labels
                datasets: [{
                    label: 'Feedbacks',
                    data: @json($feedbacksByMonth->values()), // Feedback counts as data
                    backgroundColor: 'rgba(255, 202, 40, 0.2)',
                    borderColor: '#FFA000',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        type: 'time',
                        time: {
                            unit: 'month',
                            tooltipFormat: 'MMM yyyy',
                        }
                    }
                }
            }
        });
    </script>
@endsection
