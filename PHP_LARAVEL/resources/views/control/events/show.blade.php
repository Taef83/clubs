@extends('control.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Events</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Events
                  </li>
                </ol>
              </div>
            </div>
          </div>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Events</h4>
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
					<table class="table table-striped">

						<tbody>
							<tr>
								<th>Name</th>
								<td>{{$item->event_name}}</td>
							</tr>
							<tr>
								<th>Description</th>
								<td>{{$item->event_description}}</td>
							</tr>
							<tr>
								<th>Date</th>
								<td>{{ $item->start_date }}</td>
							</tr>
							<tr>
								<th>Location</th>
								<td>{{$item->location}}</td>
							</tr>
							<tr>
								<th>Club</th>
								<td>{{$item->club?->club_name}}</td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
            <!-- Activities Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Activities</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Activity Name</th>
                                        <th>Description</th>
                                        <th>Number Of Participants</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($item->activities as $activity)
                                        <tr>
                                            <td>{{ $activity->activity_name }}</td>
                                            <td>{{ $activity->activity_description }}</td>
                                            <td>{{ $activity->number_participants }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No activities found for this event.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection





