@extends('layouts.student')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Student Information</p>
                            <p class="mb-1"><span class="text-muted">Name</span> : {{$record->name}}</p>
                            <p class="mb-1"><span class="text-muted">Course Of Study</span> : {{$record->course_of_study}}</p>
                            <p class="mb-1"><span class="text-muted">Phone Number</span> : {{$record->phone_number}}</p>
                            <p class="mb-1"><span class="text-muted">Session</span> : {{$record->session}}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Company Information</p>
                            <p class="mb-1"><span class="text-muted">Company Name: </span> {{$record->name_of_company}}</p>
                            <p class="mb-1"><span class="text-muted">Address: </span> {{$record->address_of_company}}</p>
                            <p class="mb-1"><span class="text-muted">Phone Number: </span> {{$record->company_phone_number}}</p>
                            <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                        </div>

                        <div class="col-md-6 mt-5">
                            <p class="font-weight-bold mb-4">SuperVisor Information</p>
                            <p class="mb-1"><span class="text-muted">Name</span> : {{$record->name_of_industry_supervisor}}</p>
                            <p class="mb-1"><span class="text-muted">Post held_by_supervisor</span> : {{$record->post_held_by_industry_supervisor}}</p>
                            <p class="mb-1"><span class="text-muted">Phone Number</span> : {{$record->phone_number_of_supervisor}}</p>
                        </div>
                    </div>



                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <h2 class="text-center">Details</h2>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Matric Number</td>
                                        <td>{{$record->matric_number}}</td>

                                    <tr>
                                        <td class="font-weight-bold">Level During Training</td>
                                        <td>{{$record->level_during_training}}</td>

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Date reported For Training</td>
                                        <td>{{$record->date_reported_for_training}}</td>

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Monthly Allowances</td>
                                        <td>{{$record->monthly_allowances}}</td>

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Residential Address During Training</td>
                                        <td>{{$record->residential_address_during_training}}</td>

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Final Training Date</td>
                                        <td>{{$record->final_training_date}}</td>

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Comment</td>
                                        @if(!empty($record->comment))
                                        <td>{{$record->comment}}</td>
                                        @else(empty($record->comment))
                                        <td>No Comments</td>
                                        @endif

                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Grade</td>
                                        @if(!empty($record->grade))
                                        <td>{{$record->grade}}</td>
                                        @else(empty($record->grade))
                                        <td>No Grade</td>
                                        @endif


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>


@endsection