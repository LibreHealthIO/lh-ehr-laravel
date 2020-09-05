<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormNotesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_notes table.
     * From UI, Select Patient -> Encounter -> Miscellaneous -> Work/School Note. | Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Work/School Note.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encounter_id')->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->integer('provider_id')->index()
                ->comment('Initially provider is set to be user, but when an encounter has a fee sheet
                filled out (billing table items are associated with that encounter number) then the fee sheet sets
                the Provider fields to equal the Rendering Provider choice in the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
	        $table->string('note_type')->comment('Type of Note. Viz Work Note or School Note.');
	        $table->text('message')->comment('Message in Note.');
	        $table->string('doctor')->comment('Doctor giving this note.');
	        $table->date('signature_date')->comment('When note created by doctor.');

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
        Schema::dropIfExists('form_notes');
    }
}
