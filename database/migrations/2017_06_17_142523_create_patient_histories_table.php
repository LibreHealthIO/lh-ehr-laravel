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
            $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');

	        $table->boolean('mail_mode')->default(0)
                ->comment('Allow through email. Initially set to be 0. Previously hippa_mail.');
	        $table->boolean('voice_mode')->default(0)
                ->comment('Allow voice message. Initially set to be 0. Previously hippa_voice.');
	        $table->boolean('message_mode')->default(0)
                ->comment('Allow text sms. Initially set to be 0. Previously hippa_allow_sms.');

            $table->text('message')
                ->comment('What message to be sent. Previously hippa_message.');

            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('patient_histories');
    }
}
