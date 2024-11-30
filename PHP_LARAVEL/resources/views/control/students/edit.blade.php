@extends('control.master_app.app')
@section('header')
<div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Students</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('control.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Students
                  </li>
                </ol>
              </div>
            </div>
          </div>
@endsection

@section('content')

<section class="basic-inputs">
  <div class="row match-height">
   <div class="col-xl-12 col-lg-6 col-md-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Edit [{{$item->item_name}}]</h4>
         </div>
         <div class="card-block">
            <div class="card-body">
                 <div class="col-md-12">
                  {!! Form::model($item,['route' => ['control.students.update', $item->id], 'method' => 'put','files' => true, 'class' => '']) !!}
                        @include('control.students.inputs')
                  {!! Form::close() !!}
                 </div>
            </div>
         </div>
      </div>
   </div>
  </div>
</section>

@endsection









