@extends('layouts.supervisor')
@section('content')
<!-- main section -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif

<div class="card-header d-flex justify-content-between">
    <h3>Student</h3>
    <a href="{{route('supervisor_students.create')}}" class="btn btn-primary btn-md">Create New Student</a>
</div>
<div class="card-body">

    <table class="table table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('supervisor_students.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{route('supervisor_students.destroy',$user->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{route('supervisor_students.show',$user->id)}}" class="btn btn-primary btn-sm">Profile</a>

                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection