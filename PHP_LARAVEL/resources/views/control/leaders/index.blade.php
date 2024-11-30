@extends('control.master_app.app')
@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Club Leaders</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Club Leaders</li>
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
                    <h4 class="card-title">Club Leaders</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="{{ route('control.leaders.create') }}"><i class="la la-plus"></i></a></li>
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
                                <th scope="col">Club Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#leaderModal{{ $item->id }}">
                                            {{ $item->club_leader_name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->club_leader_email }}</td>
                                    <td>{{ $item->club_leader_phone }}</td>
                                    <td>{{ $item->clubs->pluck('club_name')->join(', ') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('control.leaders.edit', $item->id) }}">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-del" data-action="{{ route('control.leaders.destroy', $item->id) }}" data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal for Club Leader Information -->
                                <div class="modal fade" id="leaderModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="leaderModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="leaderModalLabel{{ $item->id }}">Club Leader Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Name:</strong> {{ $item->club_leader_name }}</p>
                                                <p><strong>Email:</strong> {{ $item->club_leader_email }}</p>
                                                <p><strong>Phone:</strong> {{ $item->club_leader_phone }}</p>
                                                <h6>Associated Clubs:</h6>
                                                <ul>
                                                    @foreach($item->clubs as $club)
                                                        <li>{{ $club->club_name }} - {{ $club->location }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
