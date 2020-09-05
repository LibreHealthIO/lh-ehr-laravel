<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatedRemindersTable extends Migration
{
    /**
     * Run the migrations.
     * This creates dated_reminders table.
     * From UI, Messages -> Show Reminders -> Send A Dated Reminder.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('dated_reminders', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('from_id')
                ->comment('Who created dated reminder? Refers to users table.');
	        $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');
	        $table->text('dr_message_text')->comment('Message.');
	        $table->dateTime('dr_message_sent_date')->comment('When message is sent.');
	        $table->dateTime('dr_message_due_date')->comment('Due Date');
	        $table->unsignedInteger('message_priority')
                ->comment('Priority of Message. 1 -> High | 2 -> Medium | 3 -> Low');
	        $table->boolean('message_processed')->default(0)
                ->comment('Is message processed? 0 -> No | 1 -> Yes');
	        $table->dateTime('processed_date')
                ->comment('When message is processed by respective user? Not keeping it null,
                 because it can be system generated datetime, whenever message is processed.');

            // Making it null because, it will be updated when user process the message
	        $table->unsignedBigInteger('processed_by')
                ->nullable()->comment('User who processed the message. It can be multiple users or a single
                 user. References users table.');

	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('from_id')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('processed_by')->references('id')
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
        Schema::dropIfExists('dated_reminders');
    }
}
