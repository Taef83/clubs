@extends('control.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Admins</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Admins
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
				<h4 class="card-title">Admins</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a href="{{route('control.admins.create')}}"><i class="la la-plus"></i></a></li>
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
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
                  @forelse($admins as $admin)
							<tr>
								<th scope="row">{{$admin->id}}</th>
								<td>{{ $admin->admin_name }}</td>
								<td>{{ $admin->admin_email }}</td>
								<td>{{ $admin->admin_phone }}</td>
                        <td>
                        <a class="btn btn-primary" href="{{route('control.admins.edit', $admin->id)}}">
                              <i class="la la-edit"></i>Edit
                           </a>
                           @if(!in_array($admin->id, [1]))
                           <a class="btn btn-danger btn-del" data-action="{{route('control.admins.destroy', $admin->id)}}"  data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                              <i class="la la-trash"></i> Delete
                           </a>
                           @endif
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
                  {{ $admins->links() }}
               </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection










