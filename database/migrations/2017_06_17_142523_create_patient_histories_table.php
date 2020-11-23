<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     * Creates patient_histories table.
     * This table creates patient's histories and related data.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('patient_id')->comment('Foreign key to patients table.')
                ->constrained('patients');

	        $table->dateTime('cataract_surgery')->nullable()->comment('Cataract Surgery Date');
	        $table->dateTime('tonsillectomy')->nullable()->comment('Tonsillectomy Date');
	        $table->dateTime('cholecystestomy')->nullable()->comment('cholecystestomy Surgery Date');
	        $table->dateTime('heart_surgery')->nullable()->comment('Heart Surgery Date');
	        $table->dateTime('hysterectomy')->nullable()->comment('Hysterectomy Date');
	        $table->dateTime('hernia_repair')->nullable()->comment('Hernia Repair Date');
	        $table->dateTime('hip_replacement')->nullable()->comment('Hip Replacement Date');
	        $table->dateTime('knee_replacement')->nullable()->comment('Heart Surgery Date');
	        $table->dateTime('appendectomy')->nullable()->comment('Appendectomy Date');

	        $table->json('exams')->comment('Exams performed on patient');
	        $table->json('risk_factors')->comment('Risk Factors patient has');
	        $table->json('extra_fields')->comment('Extra Fields');
	        $table->longText('additional_history')->comment('Additional History');

	        // created_at column, will keep track of the history dates
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
        Schema::dropIfExists('patient_histories');
    }
}
