<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor_access');  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->where('role','=',3)->where('user_by','=',auth()->user()->id)->get();
        return view('supervisor.students.index',compact('users'));
    }

    public function create()
    {
        return view("supervisor.students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supervisor = $request->input('supervisor');

        User::create([
            "name"=>$request->input('name'),
            "email"=>$request->input('email'),
            "password"=> Hash::make($request->input('password')),
            "phone"=>$request->input('phone'),
            "role"=>3,
            'user_by'=> auth()->user()->id,
        ]);
        return redirect()->route('supervisor_students.index')->with('message','Student has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $records = Record::where('user_id','=',$id)->latest()->get();
        return view('supervisor.students.show',compact('user','records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('supervisor.students.edit',['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'password'=>$request->input('password'),
        ]);
        return redirect()->route('supervisor_students.index')->with('message','Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('supervisor_students.index')->with('Student','User has been deleted!');
    }
}
