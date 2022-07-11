<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin_access');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $users = User::latest()->where('role','=',2)->get();
        return view("admin.supervisors.index",["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.supervisors.create");
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
            "password"=> Hash:: make($request->input('password')),
            "phone"=>$request->input('phone'),
            "role"=>2,
            'user_by'=> auth()->user()->id,
            "supervisor"=> $supervisor,
        ]);
        return redirect()->route('admin_supervisors.index')->with('message','User has been created');
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
        return view('admin.supervisors.show',compact('user'));
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
      return view('admin.supervisors.edit',['user'=>$user]);

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
        $user = user::findOrFail($id);

        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            "supervisor"=>$request->input('supervisor'),
        ]);
        return redirect()->route('admin_supervisors.index')->with('message','User has been updated!');
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
        return redirect()->route('admin.index')->with('message','User has been deleted!');
    }

    public function note(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $user->update([
            "note"=>$request->input('note'),
           
        ]);
        return redirect()->route('admin.index')->with('message','Note has been Submitted');
   
    }
}
