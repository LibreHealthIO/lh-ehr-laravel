<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartTrackersTable extends Migration
{
    /**
     * Run the migrations.
     * This creates chart_trackers table.
     * From UI, Miscellaneous -> Chart Tracker.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('chart_trackers', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('user_id', 0)
                ->comment('Foreign Key to users table.');
	        $table->dateTime('when')->useCurrent()->comment('Timestamp when this created.');
	        $table->string('location')->comment('Location.');
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
        Schema::dropIfExists('chart_trackers');
    }
}
