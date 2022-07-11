@extends('layouts.supervisor')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">

                    <h2 class="text-center text-dark">Student Profile</h2>

                </div>

                <div class="card-body">

                    <div class="col-lg-4 col-sm-4 offset-lg-5">

                        <img src="{{asset('imgs/') .'/'.$user->image}}" style="width:100px;" class="ml-lg-4">

                    </div>

                    <h3 class="text-center text-dark">Name : {{$user->name}}</h3>
                    <h3 class="text-center text-dark">Email : {{$user->email}}</h3>
                    <h3 class="text-center text-dark">Number : {{$user->phone}}</h3>



                    <p class="">Records / Reports</p>


                </div>


            </div>

            <h3 class="mt-4 mb-2">Records</h3>
            <hr>
            <div class="row">
                @foreach($records as $record)

                <div class="col-lg-4 col-sm-6 mt-4">
                    <div class="card-header">
                        <h2>{{$record->name}}</h2>
                    </div>
                    <div class="card-body border">
                        <h5>Course Of Study : {{$record->course_of_study}}</h5>
                        </td>
                        <h5>Session : {{$record->session}}</h5>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('supervisor_records.show',$record->id)}}" class="btn btn-primary btn-block">Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection()