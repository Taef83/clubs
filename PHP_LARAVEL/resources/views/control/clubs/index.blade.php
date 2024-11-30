@extends('control.master_app.app')
@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Clubs</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Clubs</li>
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
                            <li><a href="{{ route('control.clubs.create') }}"><i class="la la-plus"></i></a></li>
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
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#clubModal{{ $item->id }}">
                                            {{ $item->club_name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->mission_statement }}</td>
                                    <td>{{ $item->memberships->count() }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('control.memberships.index', ['c' => $item->id]) }}">
                                            <i class="la la-certificate"></i> Memberships
                                        </a>
                                        <a class="btn btn-secondary" href="{{ route('control.events.index', ['c' => $item->id]) }}">
                                            <i class="la la-hourglass-half"></i> Events
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('control.clubs.edit', $item->id) }}">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-del" data-action="{{ route('control.clubs.destroy', $item->id) }}" data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal for Club Information -->
                                <div class="modal fade" id="clubModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="clubModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="clubModalLabel{{ $item->id }}">Club Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Club Image -->
                                                <div class="text-center mb-3">
                                                    <img src="{{ $item->avatar }}" alt="{{ $item->club_name }}" class="img-fluid rounded" style="max-height: 200px;">
                                                </div>

                                                <!-- Club Basic Information -->
                                                <div class="list-group mb-3">
                                                    <div class="list-group-item">
                                                        <strong>Name:</strong> {{ $item->club_name }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Mission Statement:</strong> {{ $item->mission_statement }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Description:</strong> {{ $item->club_description }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Location:</strong> {{ $item->location }}
                                                    </div>
                                                </div>

                                                <!-- Feedbacks Section -->
                                                <h6>Feedbacks</h6>
                                                <div class="list-group">
                                                    @forelse($item->feedbacks as $feedback)
                                                        <div class="list-group-item">
                                                            <strong>Rating:</strong> {{ $feedback->rating }}<br>
                                                            <strong>Comments:</strong> {{ $feedback->comment }}<br>
                                                            <strong>Submitted by:</strong> {{ $feedback->student->student_name ?? 'N/A' }}
                                                        </div>
                                                    @empty
                                                        <div class="list-group-item text-center">No feedbacks found</div>
                                                    @endforelse
                                                </div>

                                                <!-- Suggestions Section -->
                                                <h6 class="mt-3">Suggestions</h6>
                                                <div class="list-group">
                                                    @forelse($item->suggestions as $suggestion)
                                                        <div class="list-group-item">
                                                            <strong>Submitted by:</strong> {{ $suggestion->student->student_name ?? 'N/A' }}<br>
                                                            <strong>Content:</strong> {{ $suggestion->content }}<br>
                                                            <strong>Sent Time:</strong> {{ $suggestion->sent_time }}
                                                        </div>
                                                    @empty
                                                        <div class="list-group-item text-center">No suggestions found</div>
                                                    @endforelse
                                                </div>
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
