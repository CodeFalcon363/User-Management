@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <h3>Edit Supervisor</h3>
                </div>
                <div class="card-body">
                       
                    <form action="{{route('admin_supervisors.update',$user->id)}}" method="post">
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

                            @if(auth()->user()->role == 1)
                            <label for="">SuperVisor</label>
                            <select name="supervisor" id="2" class="form-control">
                                <option value="1" id="school-supervisor">school based supervisor</option>
                                <option value="2" id="industrial-supervisor">industrial based supervisor</option>
                            </select>
                            @endif 
                    
                            <div class="d-grid">
                            <button class=" btn btn-primary btn-block mt-4">Update</button>
                            </div>
                    
                        </form>    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

