<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'matric_number',
        'course_of_study',
        'session',
        'level_during_training',
        'phone_number',
        'name_of_company',
        'company_phone_number',
        'address_of_company',
        'date_reported_for_training',
        'name_of_industry_supervisor',
        'post_held_by_industry_supervisor',
        'phone_number_of_supervisor',
        'monthly_allowances',
        'residential_address_during_training',
        'final_training_date',
        'comment',
        'grade',
        'user_id',
    ];
}
