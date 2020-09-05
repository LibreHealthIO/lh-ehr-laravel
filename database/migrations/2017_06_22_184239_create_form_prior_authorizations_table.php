<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPriorAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates form_prior_authorizations table.
     * From UI, Select Patient -> Encounter -> Miscellaneous -> Prior Authorization Form. |
     * Select Patient -> Encounter -> Patient/Client -> Visit Forms -> Prior Authorization Form.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Lauren <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_prior_authorizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encounter_id')->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->integer('provider_id')->index()
                ->comment('Initially provider is set to be user, but when an encounter has a fee sheet
                filled out (billing table items are associated with that encounter number) then the fee sheet sets
                the Provider fields to equal the Rendering Provider choice in the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of
                the client record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
            $table->string('auth_number', 35)
                ->comment('Auth Number');
            $table->string('comments')->nullable()->comment('Comment.');

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
        Schema::dropIfExists('form_prior_authorizations');
    }
}
