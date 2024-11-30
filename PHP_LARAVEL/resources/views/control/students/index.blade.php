@extends('control.master_app.app')
@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Students</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Students</li>
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
                    <h4 class="card-title">Students</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="{{ route('control.students.create') }}"><i class="la la-plus"></i></a></li>
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
                            @forelse($items as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal{{ $item->id }}">
                                            {{ $item->student_name }}
                                        </a>
                                    </td>
                                    <td>{{ $item->student_email }}</td>
                                    <td>{{ $item->student_phone }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('control.students.edit', $item->id) }}">
                                            <i class="la la-edit"></i>Edit
                                        </a>
                                        <a class="btn btn-danger btn-del" data-action="{{ route('control.students.destroy', $item->id) }}" data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                                            <i class="la la-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal for Student Information -->
                                <div class="modal fade" id="studentModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="studentModalLabel{{ $item->id }}">Student Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Basic Student Information -->
                                                <div class="list-group">
                                                    <div class="list-group-item">
                                                        <strong>Name:</strong> {{ $item->student_name }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Email:</strong> {{ $item->student_email }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Phone:</strong> {{ $item->student_phone }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Major:</strong> {{ $item->student_major }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Skills:</strong> {{ $item->student_skills }}
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong>Student ID:</strong> {{ $item->academic_number }}
                                                    </div>
                                                </div>

                                                <!-- Memberships List -->
                                                <h6 class="mt-3">Memberships</h6>
                                                <div class="list-group">
                                                    @forelse($item->memberships as $membership)
                                                        <div class="list-group-item">
                                                            <strong>Club:</strong> {{ $membership->club->club_name }}<br>
                                                            <strong>Role:</strong> {{ $membership->role_type }}<br>
                                                            <strong>Joined At:</strong> {{ $membership->joined_at }}<br>
                                                            <strong>Status:</strong> {{ $membership->status }}
                                                        </div>
                                                    @empty
                                                        <div class="list-group-item text-center">No memberships found</div>
                                                    @endforelse
                                                </div>

                                                <!-- Certificates List -->
                                                <h6 class="mt-3">Certificates</h6>
                                                <div class="list-group">
                                                    @forelse($item->certificates as $certificate)
                                                        <div class="list-group-item">
                                                            <strong>Event:</strong> {{ $certificate->event->event_name }}<br>
                                                            <strong>Issue Date:</strong> {{ $certificate->issue_date }}<br>
                                                            <strong>Description:</strong> {{ $certificate->certificate_description }}
                                                        </div>
                                                    @empty
                                                        <div class="list-group-item text-center">No certificates found</div>
                                                    @endforelse
                                                </div>

                                                <!-- Suggestions List -->
                                                <h6 class="mt-3">Suggestions</h6>
                                                <div class="list-group">
                                                    @forelse($item->suggestions as $suggestion)
                                                        <div class="list-group-item">
                                                            <strong>Club:</strong> {{ $suggestion->club->club_name }}<br>
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
