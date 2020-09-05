<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientSocialStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates patient_social_statistics table.
     * This stores patient social information. One to one relationship with patients table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_social_statistics', function (Blueprint $table) {
            $table->bigIncrements('id');

	        $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
	        $table->string('ethnicity')->comment('Ethnicity.');
	        $table->string('religion')->comment('Religion.');
	        $table->string('interpreter')->comment('Interpreter');
	        $table->string('migrant_seasonal')->comment('Whether Migrant or Seasonal?');
	        $table->integer('family_size')->comment('Family Size of Patient');
	        $table->float('monthly_income', 5, 2)
                ->comment('Monthly income of patient.');
	        $table->boolean('homeless')->default(0)
                ->comment('Is homeless or not? 0 -> No | 1 -> Yes');
	        $table->dateTime('financial_review')->comment('Financial Review Date');
	        $table->string('language', 100)->comment('Language.');

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade');
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
        Schema::dropIfExists('patient_social_statistics');
    }
}
