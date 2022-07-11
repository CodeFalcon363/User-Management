@extends('layouts.admin')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<div class="row">
    <div class="col-lg-4 col-sm-4 offset-lg-5">
        <img src="{{asset('imgs/') .'/'. auth()->user()->image}}" style="width:100px;" class="ml-lg-4">
    </div>
</div>
<div class="row p-3">
    <div class="col-lg-12 col-sm-12">
        <h4 class="text-center text-muted">Edit  Profile</h4>
        <form action="{{route('admins.profile.update')}}" class="form mt-1 " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="mt-lg-2 mt-sm-2" style="font-weight :200;">Your Name</label>
                    <input type="text" class="form-control mt-lg-2 mt-sm-2" name="name" value="{{ Auth::user()->name }}">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-lg-3 mt-sm-3" style="font-weight :200;">Email</label>
                    <input type="text" class="form-control mt-lg-2 mt-sm-2" name="email" value="{{ Auth::user()->email }}">
                </div>


                <div class="col-lg-6 col-sm-12">
                    <label class="mt-lg-3 mt-sm-3" style="font-weight :200;">Password</label>
                    <input type="password" class="form-control mt-lg-2 mt-sm-2" name="password" placeholder="Your Password">
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-lg-3 mt-sm-3" style="font-weight :200;">Profile</label>
                    <input type="file" class="form-control mt-lg-2 mt-sm-2" name="image">
                </div>
               
            </div>
            <button type="submit" class="btn btn-success btn-block mt-lg-3 mt-sm-3">Update</button>
        </form>
    </div>
</div>
@endsection