@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
<div class="card">

    <div class="card-header">

    <h2 class="text-center text-dark">User Profile</h2>
    
</div>

        <div class="card-body">
         
        <div class="col-lg-4 col-sm-4 offset-lg-5">

        <img src="{{asset('imgs/') .'/'.$user->image}}" style="width:100px;" class="ml-lg-4">
   
        </div>
            
            <h3 class="text-center text-dark">Name : {{$user->name}}</h3>
            <h3 class="text-center text-dark">Email : {{$user->email}}</h3>
            <h3 class="text-center text-dark">Number : {{$user->phone}}</h3>

            <form action="{{route('note')}}" method="POST">
                @csrf

                <label for="">Note</label>
                <input type="hidden" name="id" value="{{$user->id}}">
                
              <textarea class="form-control" name="note" id="note" cols="10" rows="5" placeholder="Write note Here!"></textarea>


            <p class="">Records    /     Reports</p>


        </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-dark btn-block">Submit</button>
            </div>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection()