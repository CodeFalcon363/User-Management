@extends('layouts.supervisor')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <h4>Edit Student</h4>
                </div>
                <div class="card-body">
                       
                    <form action="{{route('supervisor_students.update',$user->id)}}" method="post">
                        @csrf

                        <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name">
                            
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="{{$user->email}}" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" value="{{$user->phone}}" name="phone" id="phone">
                            </div>

                          
                    
                            <div class="d-grid">
                            <button class=" btn btn-primary btn-block">Update</button>
                            </div>
                    
                        </form>    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

