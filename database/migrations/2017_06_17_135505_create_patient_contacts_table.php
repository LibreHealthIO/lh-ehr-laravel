<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientContactsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates patient_contacts table.
     * Its purpose is to store the contact's information of a patient.
     * Many to many relationship with patient_data.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');

            // TODO might reference to some provider/user
	        $table->unsignedBigInteger('provider_id')->comment('Provider Id');
	        $table->unsignedBigInteger('reference_provider_id')->comment('Reference Provider Id');

	        $table->string('home_phone')->comment('Contact home phone');
	        $table->string('work_phone')->comment('Contact business phone');
	        $table->string('contact_phone')->comment('Personal contact phone number.');
	        $table->string('contact_relationship')
                ->comment('what relationship does contact have with patient.');
	        $table->string('patient_email')->unique()
                ->comment('Additional field added. Contact email id.');
	        $table->string('county')->comment('county');

	        // Country foreign key
            $table->unsignedBigInteger('country_id')->nullable()->default(167)
                ->comment('Country code of patient contact');
            $table->foreign('country_id')->references('id')
                ->on('world_countries')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('patient_contacts');
    }
}
