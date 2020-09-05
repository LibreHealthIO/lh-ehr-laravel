<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates batch_communications table. Earlier (batchcom).
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('batch_communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
            $table->unsignedBigInteger('sender_id')->comment('Foreign key to users table.');
            $table->string('msg_type')->comment('Message Type');
            $table->string('msg_subject')->nullable()->comment('Subject');
            $table->string('msg_text')->nullable()->comment('Message to be sent.');
            $table->dateTime('msg_date_sent')->useCurrent()
                ->comment('Timestamp when message was sent.');

            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')
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
        Schema::dropIfExists('batch_communications');
    }
}
