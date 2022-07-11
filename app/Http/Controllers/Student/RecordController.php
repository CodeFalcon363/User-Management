<?php


namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
class RecordController extends Controller
{
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student_access');
    }
   
    public function index()
    {
            $records = Record::where('user_id','=',auth()->user()->id)->get();
            return view("student.records.index",compact("records"));
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.records.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Record::create([
            "name"=> auth()->user()->name,
            "matric_number"=>$request->input('matric_number'),
            "course_of_study"=>$request->input('course_of_study'),
            "session"=>$request->input('session'),
            "level_during_training"=>$request->input('level_during_training'),
            "phone_number"=>$request->input('phone_number'),
            "name_of_company"=>$request->input('name_of_company'),
            "address_of_company"=>$request->input('address_of_company'),
            "date_reported_for_training"=>$request->input('date_reported_for_training'),
            "name_of_industry_supervisor"=>$request->input('name_of_industry_supervisor'),
            "post_held_by_industry_supervisor"=>$request->input('post_held_by_industry_supervisor'),
            "phone_number_of_supervisor"=>$request->input('phone_number_of_supervisor'),
            "company_phone_number"=>$request->input('company_phone_number'),
            "monthly_allowances"=>$request->input('monthly_allowances'),
            "residential_address_during_training"=>$request->input('residential_address_during_training'),
            "final_training_date"=>$request->input('final_training_date'),
            "user_id"=>auth()->user()->id,
        ]);
        return redirect()->route('records.index')->with('message','Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::where('id','=',$id)->where('user_id','=',auth()->user()->id)->firstOrFail();
        return view('student.records.show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $record = Record::findOrFail($id);
      return view('student.records.edit',['record'=>$record]);

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
        $record = record::findOrFail($id);

        $record->update([
            "name"=>$request->input('name'),
            "matric_number"=>$request->input('matric_number'),
            "course_of_study"=>$request->input('course_of_study'),
            "session"=>$request->input('session'),
            "level_during_training"=>$request->input('level_during_training'),
            "phone_number"=>$request->input('phone_number'),
            "name_of_company"=>$request->input('name_of_company'),
            "address_of_company"=>$request->input('address_of_company'),
            "date_reported_for_training"=>$request->input('date_reported_for_training'),
            "name_of_industry_supervisor"=>$request->input('name_of_industry_supervisor'),
            "post_held_by_industry_supervisor"=>$request->input('post_held_by_industry_supervisor'),
            "phone_number_of_supervisor"=>$request->input('phone_number_of_supervisor'),
            "company_phone_number"=>$request->input('company_phone_number'),
            "monthly_allowances"=>$request->input('monthly_allowances'),
            "residential_address_during_training"=>$request->input('residential_address_during_training'),
            "final_training_date"=>$request->input('final_training_date'),
            "school_based_supervisor_staff_id"=>$request->input('school_based_supervisor_staff_id'),
       
        ]);
        return redirect()->route('records.index')->with('message','Record has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();
        return redirect()->route('records.index')->with('message','Record has been deleted!');
    }
}
