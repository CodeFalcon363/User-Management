@extends('layouts.student')
@section('content')
<!-- main section -->
@if(session()->has('message'))
<div class="alert alert-success">
  {{session()->get('message')}}
</div>
@endif

<div class="card-header d-flex justify-content-between">
  <h3>Records</h3>
  <a href="{{route('records.create')}}" class=" btn btn-primary">Create New Record</a>
</div>
<hr>
<div class="row">
  @foreach($records as $record)

  <div class="col-lg-4 col-sm-6 mt-4">
    <div class="card-body border">
      <h5>Course Of Study : {{$record->course_of_study}}</h5>
      </td>
      <h5>Session : {{$record->session}}</h5>
    </div>
    <div class="card-footer">
      <a href="{{route('records.show',$record->id)}}" class="btn btn-primary btn-block">Details</a>
    </div>
  </div>
  @endforeach
</div>

@endsection