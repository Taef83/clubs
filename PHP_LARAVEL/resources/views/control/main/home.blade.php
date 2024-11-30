
@extends('control.master_app.app')

@section('content')

<!-- Chart -->
<!-- eCommerce statistic -->
<div class="row">
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted danger position-absolute p-1">Club Leaders</h6>
                <div>
                    <i class="ft-users danger font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                   <div class="text-center mt-4">
                        <h3>{{$stats['leaders']}} </h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted info position-absolute p-1">Clubs</h6>
                <div>
                    <i class="ft-layout info font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{$stats['clubs']}}</h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted warning position-absolute p-1">Students</h6>
                <div>
                    <i class="la la-group warning font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{$stats['students']}} </h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted primary position-absolute p-1">Feedbacks</h6>
                <div>
                    <i class="la la-star primary font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{$stats['feedback']}} </h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted secondery position-absolute p-1">Events</h6>
                <div>
                    <i class="la la-hourglass-half secondery font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{$stats['events']}}</h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h6 style="font-size: 12px;" class="text-muted dark position-absolute p-1">Membership</h6>
                <div>
                    <i class="la la-certificate dark font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{$stats['membership']}} </h3>
                   </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Clubs and Event Count</h4>
            </div>
            <div class="card-body">
                <canvas id="clubsEventsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Clubs and Membership Count</h4>
            </div>
            <div class="card-body">
                <canvas id="clubsMembershipChart"></canvas>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted success position-absolute p-1">Best Club of the Month</h5>
                <div>
                    <i class="la la-trophy success font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div class="text-center mt-4">
                        <h3>{{ $bestClub->club_name }} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('control/theme-assets/css/pages/dashboard-ecommerce.css')}}">
    <style>
        .height-180 {
            height: 138px !important;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('clubsEventsChart').getContext('2d');
        var clubsEventsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($clubNames),
                datasets: [{
                    label: 'Number of Events',
                    data: @json($eventCounts),
                    backgroundColor: 'rgb(159,120,255)',
                    borderColor: 'rgb(159,120,255)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Membership Chart
        var ctx2 = document.getElementById('clubsMembershipChart').getContext('2d');
        var clubsMembershipChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: @json($clubNames),
                datasets: [{
                    label: 'Number of Memberships',
                    data: @json($membershipCounts),
                    backgroundColor: 'rgb(159,120,255)',
                    borderColor: 'rgb(159,120,255)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
