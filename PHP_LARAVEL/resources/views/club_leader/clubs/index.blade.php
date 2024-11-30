@extends('club_leader.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Clubs</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('leader.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Clubs
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
				<h4 class="card-title">Clubs</h4>
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
								<th scope="col">Name</th>
								<th scope="col">Mission Statement</th>
								<th scope="col">Memberships</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
                  @forelse($items as $item)
							<tr>
								<th scope="row">{{$item->id}}</th>
								<td>{{ $item->club_name }}</td>
								<td>{{ $item->mission_statement }}</td>
								<td>{{ $item->memberships->count() }}</td>
                        <td>
							<a class="btn btn-warning" href="{{route('leader.memberships.index', ['c' => $item->id])}}">
                              <i class="la la-certificate"></i>Memberships
                           </a>
						   <a class="btn btn-secondary" href="{{route('leader.events.index', ['c' => $item->id])}}">
                              <i class="la la-hourglass-half"></i>Events
                           </a>
                        <a class="btn btn-primary" href="{{route('leader.clubs.edit', $item->id)}}">
                              <i class="la la-edit"></i>Edit
                           </a>
						   
                           <a class="btn btn-danger btn-del" data-action="{{route('leader.clubs.destroy', $item->id)}}"  data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                              <i class="la la-trash"></i> Delete
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










