@extends('club_leader.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Attendance</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('leader.home') }}">Home</a>
                  </li>
				  <li class="breadcrumb-item"><a href="{{ route('leader.events.show', $event->id) }}">{{ $event->event_name }}</a>
                  </li>
                  <li class="breadcrumb-item active">Attendance
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
				<h4 class="card-title">Attendance</h4>
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
				<form action="{{ route('leader.events.attend.action', $event->id) }}" method="post">
					@csrf
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Student</th>
									<th scope="col">Time</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
					@forelse($event->registrations as $k => $item)
								<tr>
									<td>
										<span class="mt-2">{{ $item->student?->student_name }}</span>
										<input type="hidden" name="attend[{{$k}}][student]" value="{{$item->student_id}}">
									</td>
									<td>
										@php $attend = studentAttendData($item->student_id, $event->id); @endphp
										<input type="time" name="attend[{{$k}}][time]" value="{{$attend ? $attend->attended_time : ''}}" class="form-control">
									</td>
									<td>
										<input type="checkbox" name="attend[{{$k}}][status]" class="mt-1" value="1" {{ isStudentAttend($item->student_id, $event->id) ? 'checked' : '' }}> Attend
									</td>
								</tr>
						@empty
						<tr>
							<th colspan="6" class="text-center">No Data Found.</th>
						</tr>
						@endforelse
							</tbody>
						</table>
					
					</div>
					<div class="row ml-2 mb-5">
							<div class="col-md-12">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection










