<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Record;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;

class AdminController extends Controller
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
        $supervisors = User::where('role','=',2)->count();
        $students = User::where('role','=',3)->count();
        $records = Record::count();
        return view('admin.dashboard',compact('supervisors','students','records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
    public function profile()
    {
        return view('admin.profile');
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'image'=> $image
        ]);
        
        return redirect()->route('admins.profile')->with('message','Profile has been updated!');
    }

}
