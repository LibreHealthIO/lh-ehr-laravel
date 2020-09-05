<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatedReminderLinksTable extends Migration
{
    /**
     * Run the migrations.
     * This creates dated_reminder_links table.
     * It stores the link of dated reminder and user, i.e., to which user that reminder is sent?
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('dated_reminder_links', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('dated_reminder_id')
                ->comment('Link to dated_reminders table.');
	        $table->unsignedBigInteger('to_id')
                ->comment('Link to users table');

	        $table->foreign('dated_reminder_id')->references('id')
                ->on('dated_reminders')->onDelete('cascade');
	        $table->foreign('to_id')->references('id')
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
        Schema::dropIfExists('dated_reminder_links');
    }
}
