<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates user_settings table.
     * Contain the settings of user.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->bigIncrements('id')->comment = "Primary key. Autoincremement.";
            $table->unsignedBigInteger('user_id')->comment('User Id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
	        $table->string('setting_label')->comment = "Setting Label";
	        $table->integer('setting_value', 0)->comment = "Setting Value";
	        $table->index('setting_label'); //Create index on setting_label.
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
        Schema::dropIfExists('user_settings');
    }
}
