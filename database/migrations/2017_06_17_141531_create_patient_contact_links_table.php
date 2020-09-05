<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientContactLinksTable extends Migration
{
    /**
     * Run the migrations.
     * Implements many to many relationship with patient and contacts.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_contact_links', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');
            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');

            $table->unsignedBigInteger('contact_id')
                ->comment('Foreign key for patient contacts linking.');
            $table->foreign('contact_id')->references('id')
                ->on('patient_contacts')->onDelete('cascade');

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
        Schema::dropIfExists('patient_contact_links');
    }
}
