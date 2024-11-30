@extends('control.master_app.app')

@section('header')
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Leader Requests</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Leader Requests</li>
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
                    <h4 class="card-title">Pending Leader Requests</h4>
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
                            @forelse($pendingLeaders as $leader)
                                <tr>
                                    <th scope="row">{{ $leader->id }}</th>
                                    <td>{{ $leader->club_leader_name }}</td>
                                    <td>{{ $leader->club_leader_email }}</td>
                                    <td>{{ $leader->club_leader_phone }}</td>
                                    <td>
                                        <form action="{{ route('control.leaders.accept', $leader->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                        <form action="{{ route('control.leaders.reject', $leader->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5" class="text-center">No pending leader requests.</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $pendingLeaders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
