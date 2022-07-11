@extends('layouts.student')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">  
                <div class="card-header d-flex justify-content-between">
                   <h3>Create New Records</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('records.store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="matric_number">Matric Number</label>
                                <input type="number" class="form-control" name="matric_number" id="matric_number">
                            </div>

                            <div class="form-group">
                                <label for="course_of_study">Course Of Study</label>
                                <input type="text" class="form-control" name="course_of_study" id="course_of_study">
                            
                            </div>
                    
                            <div class="form-group">
                                <label for="session">Session</label>
                                <input type="date" class="form-control" name="session" id="session">
                            </div>

                            <div class="form-group">
                                <label for="level_during_training">Level-During_Training</label>
                                <input type="number" class="form-control" name="level_during_training" id="level_during_training">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number">
                            </div>

                            <div class="form-group">
                                <label for="name_of_company">Name_Of_Company</label>
                                <input type="text" class="form-control" name="name_of_company" id="name_of_company">
                            </div>

                            <div class="form-group">
                                <label for="company_phone_number">Company Phone Number</label>
                                <input type="number" class="form-control" name="company_phone_number" id="company_phone_number">
                            </div>

                            <div class="form-group">
                                <label for="address_of_company">Address_Of_Company</label>
                                <input type="text" class="form-control" name="address_of_company" id="address_of_company">
                            </div>

                            <div class="form-group">
                                <label for="date_reported_for_training">Date_Reported_For_Training</label>
                                <input type="date" class="form-control" name="date_reported_for_training" id="date_reported_for_training">
                            </div>

                            <div class="form-group">
                                <label for="name_of_industry_supervisor">Name_Of_Industry_Supervisor</label>
                                <input type="text" class="form-control" name="name_of_industry_supervisor" id="name_of_industry_supervisor">
                            </div>

                            <div class="form-group">
                                <label for="post_held_by_industry_supervisor">Post_Held_By_Industry_Supervisor</label>
                                <input type="text" class="form-control" name="post_held_by_industry_supervisor" id="post_held_by_industry_supervisor">
                            </div>

                            <div class="form-group">
                                <label for="phone_number_of_supervisor">Phone_Number_Of_Supervisor</label>
                                <input type="number" class="form-control" name="phone_number_of_supervisor" id="phone_number_of_supervisor">
                            </div>

                            <div class="form-group">
                                <label for="monthly_allowances">Monthly_Allowances</label>
                                <input type="number" class="form-control" name="monthly_allowances" id="monthly_allowances">
                            </div>

                            <div class="form-group">
                                <label for="residential_address_during_training">residential_address_during_training</label>
                                <input type="text" class="form-control" name="residential_address_during_training" id="residential_address_during_training">
                            </div>

                            <div class="form-group">
                                <label for="final_training_date">final_training_date</label>
                                <input type="date" class="form-control" name="final_training_date" id="final_training_date">
                            </div>

                        
                            <div class="d-grid">
                            <button class="btn btn-primary btn-block">Create</button>

</div>
                            <br>
                    
                        </form>    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
