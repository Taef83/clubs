@extends('control.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Top {{$limit}} Club has Memberships</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Top {{$limit}} Club has Memberships
                  </li>
                </ol>
              </div>
            </div>
          </div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Top {{$limit}} Club has Memberships</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
			
				<div class="table-responsive">
                <div class="row mt-2 mb-2 ml-2">
                <div class="col-md-12">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="l" class="form-control" id="">
                                    @foreach([10, 20, 30, 40, 50] as $v)
                                    <option value="{{$v}}" {{ $v == $limit ? 'selected' : '' }}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Apply</button>

                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Club</th>
								<th scope="col">Membership Numbers</th>
							</tr>
						</thead>
						<tbody>
                  @forelse($clubsWithMostMembers as $item)
							<tr>
								<th scope="row">{{$item->id}}</th>
								<td>{{ $item->club_name }}</td>
								<td>{{ $item->memberships_count }}</td>
                      
							</tr>
                     @empty
                     <tr>
                        <th colspan="6" class="text-center">No Data Found.</th>
                     </tr>
                     @endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="col-md-4">
    <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pie Chart</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                            <div class="height-400">
                        <canvas id="simple-pie-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection




@section('js')
<script src="{{url('control/theme-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>

<script>
    $(window).on("load", function(){

//Get the context of the Chart canvas element we want to select
var ctx = $("#simple-pie-chart");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
};

// Chart Data
var chartData = {
    labels: @json($handle['names']),
    datasets: [{
        label: "Top {{$limit}} Club has Memberships",
        data: @json($handle['numbers']),
        backgroundColor: @json($handle['colors']),
    }]
};

var config = {
    type: 'pie',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var pieSimpleChart = new Chart(ctx, config);
});
</script>
@endsection






