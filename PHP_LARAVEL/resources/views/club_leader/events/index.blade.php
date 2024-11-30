@extends('club_leader.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Events</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('leader.home') }}">Home</a>
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
						<li><a href="{{route('leader.events.create')}}"><i class="ft-plus"></i></a></li>
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Club</th>
								<th scope="col">Date</th>
                                <th scope="col">Activities</th>

                                <th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
                  @forelse($items as $item)
							<tr>
								<th scope="row">{{$item->id}}</th>
								<td>{{ $item->event_name }}</td>
								<td>{{ $item->club?->club_name }}</td>
								<td>
									{{ $item->start_date }}
								</td>
                                <td>{{ $item->activities->count() }}</td> <!-- Number of activities -->

                                <td>
							<a class="btn btn-warning" href="{{route('leader.registrations.index')}}?c={{$item->id}}">
                              <i class="la la-user"></i>Registrations
                           </a>
						   <a class="btn btn-secondary" href="{{route('leader.events.attend', $item->id)}}">
                              <i class="la la-file-text"></i>Attendance
                           </a>
                           <a class="btn btn-info" href="{{route('leader.events.show', $item->id)}}">
                              <i class="la la-eye"></i>
                           </a>
						   <a class="btn btn-primary" href="{{route('leader.events.edit', $item->id)}}">
                              <i class="la la-edit"></i>
                           </a>
                           <a class="btn btn-danger btn-del" data-action="{{route('leader.events.destroy', $item->id)}}"  data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                              <i class="la la-trash"></i>
                           </a>
                        </td>
							</tr>
                     @empty
                     <tr>
                        <th colspan="6" class="text-center">No Data Found.</th>
                     </tr>
                     @endforelse
						</tbody>
					</table>
               <div class="text-center">
                  {{ $items->links() }}
               </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection










