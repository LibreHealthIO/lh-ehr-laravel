<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientFaceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates patient_face_sheets table.
     * It stores the Face Sheet information from UI leaving the address field.
     * @author Priyanshu Sinha. <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_face_sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');

	        $table->string('first_name')->comment('First Name');
	        $table->string('middle_name')->nullable()->comment('Middle Name - Optional');
	        $table->string('last_name')->comment('Last Name');
	        $table->date('dob')->comment('Date of Birth');
	        $table->string('marital_status')->comment('Marital Status');
	        $table->string('license_id')->unique()->comment('License Id');
	        $table->string('email')->unique()->comment('Email');
	        $table->string('sex', 6)->comment('Sex');
	        $table->longText('billing_note')->nullable()->comment('Billing Note');

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
        Schema::dropIfExists('patient_face_sheets');
    }
}
