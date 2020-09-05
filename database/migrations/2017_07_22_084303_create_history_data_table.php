<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryDataTable extends Migration
{
    /**
     * Run the migrations.
     * This creates history_data table.
     * Stores medical history of patients.
     * From UI, Select Patient -> History.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('history_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');

	        /* Risk Factors e.g -> {"Varicose Veins" : true }, {"Hypertension" : false} */
	        $table->json('risk_factors')->nullable()
                ->comment('Stores risk factors.The field name is key and boolean is value.');

	        /* Exams e.g -> {"Breast Exam" : "Nor", "Notes" : "Sample", "Date" : "2017-12-12"} */
	        $table->json('exams')->nullable()->comment('Stores exams/test data.');


	        /* Family History */
	        $table->json('history_mother')->nullable()
                ->comment('Stores mother\'s history with diagnosis code.');
	        $table->json('history_father')->nullable()
                ->comment('Stores father\'s history with diagnosis code.');
	        $table->json('history_siblings')->nullable()
                ->comment('Stores siblings\'s history with diagnosis code.');
	        $table->json('history_offspring')->nullable()
                ->comment('Stores children\'s history with diagnosis code.');
	        $table->json('history_spouse')->nullable()
                ->comment('Stores wife\'s history with diagnosis code.');

	        /* Relatives History */
	        $table->string('relatives_cancer')->nullable()
                ->comment('Cancer information of relatives.');
	        $table->string('relatives_diabetes')->nullable()
                ->comment('Diabetes information of relatives');
	        $table->string('relatives_tuberculosis')->nullable()
                ->comment('Tuberculosis information of relatives');
	        $table->string('relatives_high_blood_pressure')->nullable()
                ->comment('Blood Pressure information of relatives');
	        $table->string('relatives_heart_problems')->nullable()
                ->comment('Heart Related information of relatives');
	        $table->string('relatives_stroke')->nullable()
                ->comment('Stroke information of relatives.');
	        $table->string('relatives_epilepsy')->nullable()
                ->comment('Epilepsy information of relatives.');
	        $table->string('relatives_mental_illness')->nullable()
                ->comment('Mental illeness information of relatives.');

	        /* Lifestyle History */
	        $table->json('coffee')->nullable()->comment('Coffee data in json format.');
	        $table->json('tobacco')->nullable()->comment('Tobacco data.');
	        $table->json('alcohol')->nullable()->comment('Alcohol data.');
	        $table->string('sleep_patterns')->nullable()->comment('Sleep Pattern.');
	        $table->json('exercise_patterns')->nullable()->comment('Exercise Pattern.');
	        $table->string('seat_belt_use')->nullable()->comment('Seat belt Use.');
	        $table->json('counseling')->nullable()->comment('Counselling');
	        $table->json('hazardous_activities')->nullable()->comment('Hazardous Activities');
	        $table->json('recreational_drugs')->nullable()->comment('Recreational Drugs.');

	        /* Others */
	        $table->json('name_value')->nullable()->comment('Name-Value Pair');
	        $table->longText('additional_history')->nullable()->comment('Additional History.');

	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('history_data');
    }
}
