@extends('student.master_app.app')

@section('content')
    <div class="container py-4 mt-4">
        <div class="row clubsss">
            <div class="col-md-12 mb-3 text-center">
                <h4>Explore Our Clubs</h4>
            </div>
            <!-- Search Box on the left side with styling -->
            <div class="col-lg-7  mb-4">
                <form method="GET" action="{{ route('student.clubs') }}" class="p-3 shadow-sm  formSearc rounded">
                    <h5 class="mb-4 text-center"><i class="fa fa-filter"></i> Filters </h5>
                    <div class="form-group mb-4">
                        <input type="text" name="w" id="club_name" class="form-control" value="{{ request()->w }}" placeholder="Enter club name">
                    </div>
{{--                    <div class="form-group mb-4">--}}
{{--                        <input type="text" name="location" id="club_location" class="form-control" value="{{ request()->location }}" placeholder="Enter location">--}}
{{--                    </div>--}}
                    <div class="form-group mb-4">
                        <select name="rating" id="club_rating" class="form-control">
                            <option value="">Select Rating</option>
                            @foreach(range(1,5) as $r)
                            <option value="{{$r}}" {{ request()->rating == $r ? 'selected' : '' }}>{{$r}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div>
                         <button type="submit" class="btn btn-success1 btn-sm  me-2"><i class="fa text-white  fa-search"></i></button>
                     </div>
                       <div>
                           <a style="font-size: 12px !important;" href="{{ route('student.clubs') }}" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash"></i></a>
                       </div>
                </form>
            </div>

            <!-- Clubs Display -->
            <div class="col-lg-12">
                <div class="row">
                    @foreach($clubs as $club)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0 p-2">
                                    <img class="card-img-top rounded-0 img-fluid club-img2" src="{{ $club->avatar }}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="{{route('student.club', $club->id)}}"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <a href="{{route('student.club', $club->id)}}" class="h3 text-decoration-none">{{$club->club_name}}</a>
                                    <ul class="w-100 mt-2 mb-2 list-unstyled d-flex justify-content-between mb-0">
{{--                                        <li>Leader: {{ optional($club->clubLeader)->club_leader_name }}</li>--}}
                                    </ul>
                                    <ul class="w-100 mb-2 list-unstyled d-flex justify-content-between mb-0">
{{--                                        <li><i class="fa fa-map-marked"></i> {{ $club->location }}</li>--}}
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            @foreach(range(1,5) as $r)
                                                <i class='fa fa-star {{$r <= $club->rating() ? "text-warning" : "text-muted"}}'></i>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $clubs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
