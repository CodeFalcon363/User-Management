<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Records extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('matric_number');
            $table->string('course_of_study');
            $table->date('session');
            $table->integer('level_during_training');
            $table->string('phone_number');
            $table->string('name_of_company');
            $table->string('company_phone_number');
            $table->string('address_of_company');
            $table->date('date_reported_for_training');
            $table->string('name_of_industry_supervisor');
            $table->string('post_held_by_industry_supervisor');
            $table->string('phone_number_of_supervisor');
            $table->integer('monthly_allowances');
            $table->string('residential_address_during_training');
            $table->date('final_training_date');
            $table->string('comment')->nullable();
            $table->string('grade')->nullable();
            $table->integer('user_id');
            $table->rememberToken();
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
