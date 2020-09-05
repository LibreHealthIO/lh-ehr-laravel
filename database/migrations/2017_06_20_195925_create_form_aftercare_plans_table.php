<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAftercarePlansTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_aftercare_plans table.
     * From UI, Select Patient -> Encounter -> Miscellaneous -> Aftercare Plan. |
     * Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Aftercare Plan.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_aftercare_plans', function (Blueprint $table) {
            $table->bigIncrements('id');

	        $table->unsignedBigInteger('encounter_id')
            ->comment('Foreign key to form_encounters table.');

	        $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
	        $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
	        $table->unsignedBigInteger('provider_id')->index()->comment('Initially provider is set to be
	    user, but when an encounter has a fee sheet filled out (billing table items are associated with that encounter
	    number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in the fee sheet');


	        $table->dateTime('date')->comment('Date when this form filled.');
	        $table->boolean('is_authorized')->default(0)
                ->comment('Means a clinician (physician, etc...)
            has verified this form as part of the client record');
	        $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
	        $table->string('client_name')->comment('Name of Patient.');
	        $table->dateTime('admit_date')->comment('Date when patient is admitted');
	        $table->dateTime('discharged')->nullable()->comment('Date when patient is discharged.');
	        $table->text('goal_a_acute_intoxication')->nullable()->comment('Look at form UI.');
	        $table->text('goal_a_acute_intoxication_I')->nullable()->comment('Look at form UI.');
            $table->text('goal_a_acute_intoxication_II')->nullable()->comment('Look at form UI.');
            $table->text('goal_b_emotional_behavioral_conditions')->nullable()
                ->comment('Look at form UI.');
            $table->text('goal_b_emotional_behavioral_conditions_I')->nullable()
                ->comment('Look at form UI.');
            $table->text('goal_c_relapse_potential')->nullable()->comment('Look at form UI.');
            $table->text('goal_c_relapse_potential_I')->nullable()->comment('Look at form UI.');


	    $table->foreign('encounter_id')->references('id')
            ->on('encounters')->onDelete('cascade');
	    $table->foreign('patient_id')->references('id')
            ->on('patients')->onDelete('cascade');
	    $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('form_aftercare_plans');
    }
}
