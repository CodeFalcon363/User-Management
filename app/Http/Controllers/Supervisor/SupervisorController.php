<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Record;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor_access');  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = User::where('role','=',3)->where('user_by','=',auth()->user()->id)->count();
        $records = Record::count();
        return view('supervisor.dashboard',compact('students','records'));
    }

    public function profile()
    {
        return view('supervisor.profile');
    }   

    
    public function update(Request $request)
    {
        $password = auth()->user()->password;
        $image = auth()->user()->image;

        if(!empty($request->input('password'))){
            $password = Hash::make($request->input('password'));
        }


        if ($file = $request->file('image')) {
            $image = date('YmdHis').".". $file->extension();
            $file->move(public_path('imgs/'),$image);
        }
        
        auth()->user()->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=> $password,
            'image'=> $image,
        ]);
        return redirect()->route('supervisors.profile')->with('message','Profile has been updated!');
    }

}
