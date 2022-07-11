<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        if(Auth::check()){
            $role = auth()->user()->role;

            if($role == 1){
                return redirect()->route('admin.index');
            }elseif ($role == 2) {
                return redirect()->route('supervisors.index');
            }elseif ($role == 3) {
                return redirect()->route('students.index');
            }
    }
}
}
