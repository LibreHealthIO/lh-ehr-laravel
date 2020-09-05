<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientEmployersTable extends Migration
{
    /**
     * Run the migrations.
     * Creates patient_employers table. Previously employer_data.
     * Stores the patient's employer information. One to one relationship with patient_data and one to many
     * relationship with addresses.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_employers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
            $table->unsignedBigInteger('address_id')->comment('Foreign key to addresses table.');
            $table->string('name')->comment('Employers Name');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onDelete('cascade');
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
        Schema::dropIfExists('patient_employers');
    }
}
