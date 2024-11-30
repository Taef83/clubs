@extends('club_leader.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Memberships</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('leader.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Memberships
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
				<h4 class="card-title">Memberships</h4>
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
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Student</th>
								<th scope="col">Club</th>
{{--								<th scope="col">Role Type</th>--}}
								<th scope="col">Join At</th>
								<th scope="col">Status</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
                  @forelse($items as $item)
							<tr>
								<th scope="row">{{$item->id}}</th>
								<td>
                                    <!-- Trigger modal -->
                                    <a href="#" data-toggle="modal" data-target="#studentModal{{ $item->student->id }}">
                                        {{ $item->student?->student_name }}
                                    </a>
                                </td>
								<td>{{ $item->club?->club_name }}</td>
{{--								<td>{{ $item->role_type }}</td>--}}
								<td>{{ $item->joined_at }}</td>
								<td>
									@if($item->status == 'active')
									<span class="badge badge-pill badge-success">Active</span>
									@else
									<span class="badge badge-pill badge-danger">Inactive</span>
									@endif
								</td>
								<td>
									@if($item->status == 'active')
									<a href="{{route('leader.memberships.status', $item->id)}}?status=inactive" class="btn btn-danger">
										<i class="la la-times"></i> Inactive
									</a>
									@else
									<a href="{{route('leader.memberships.status', $item->id)}}?status=active" class="btn btn-success">
										<i class="la la-check"></i> Active
									</a>
									@endif
								</td>

							</tr>

                            <!-- Modal for Student Details -->
                            <div class="modal fade" id="studentModal{{ $item->student->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{ $item->student->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="studentModalLabel{{ $item->student->id }}">Student Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $item->student?->student_name }}</p>
                                            <p><strong>Email:</strong> {{ $item->student?->student_email }}</p>
                                            <p><strong>Phone:</strong> {{ $item->student?->student_phone }}</p>
                                            <p><strong>Major:</strong> {{ $item->student?->student_major }}</p>
                                            <p><strong>Skills:</strong> {{ $item->student?->student_skills }}</p>
                                            <p><strong>Academic Number:</strong> {{ $item->student?->academic_number }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     @empty
                     <tr>
                        <th colspan="8" class="text-center">No Data Found.</th>
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










