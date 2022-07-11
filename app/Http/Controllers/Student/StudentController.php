<?php

namespace App\Http\Controllers\Student;
use App\Models\User;
use App\Models\Record;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student_access');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = User::where('role','=',3)->count();
        $records = Record::count();
        return view('student.dashboard',compact('students','records'));
    }

    public function show()
    {
       
    }

    public function profile()
    {
        return view('student.profile');
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
        return redirect()->route('student.profile')->with('message','Profile has been updated!');
    }
}
