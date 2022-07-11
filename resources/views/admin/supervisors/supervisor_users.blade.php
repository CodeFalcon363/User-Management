@extends('layouts.master')
@section('content')
               <!-- main section -->
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif

                <div class="card-header">
                   <h2>User</h2>
                <a href="{{route('users.create')}}" class="btn btn-primary btn-md">Create New User</a>
                </div>
                <div class="card-body">

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($users  as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                          
                            <td>
                                <div class="btn-group">
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>

                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <a href="{{route('users.show',$user->id)}}" class="btn btn-primary btn-sm">Profile</a>

                            </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                    <div class="col-4">
                        {{$users->links()}}
                    </div>
</div>
      
@endsection