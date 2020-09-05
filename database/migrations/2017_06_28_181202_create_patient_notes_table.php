<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientNotesTable extends Migration
{
    /**
     * Run the migrations.
     * Creates patient_notes table.
     * From UI, Select Patient -> Notes.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patient_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
	        $table->unsignedBigInteger('user_id')->comment('Foreign key to users table');
	        $table->unsignedBigInteger('assigned_to')
                ->comment('Foreign key to users table. It is basically that user whom that note is assigned');

	        $table->dateTime('date')->useCurrent()
                ->comment('Timestamp at which date is created.');
	        $table->longText('body')->nullable()
                ->comment('Message sent by user.');
	        $table->boolean('activity')->default(0)
                ->comment('Is note active? 0 -> No | 1 -> Yes');
	        $table->boolean('authorized')->default(0)
                ->comment('Is note authorized? 0 -> No | 1 -> Yes');
	        $table->string('title')->comment('Type');

	        $table->boolean('deleted')->default(0)
                ->comment('Indicates note is deleted. 0 -> No | 1 -> Yes');
	        $table->string('message_status')->default('new')->comment('Status of message');
	        $table->string('portal_relation')->nullable()->comment('Patient Portal Relation');

	        $table->boolean('is_msg_encrypted')->default(0)
                ->comment('Whether message is encrypted? 0 -> No | 1 -> Yes');

	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('assigned_to')->references('id')
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
        Schema::dropIfExists('patient_notes');
    }
}
