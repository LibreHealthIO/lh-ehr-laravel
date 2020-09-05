<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTrackAnythingResultsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates form_track_anything_results tables.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_track_anything_results', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('track_anything_id')
                ->comment('Foreign key to form_track_anythings table.');

	        $table->unsignedBigInteger('track_anything_type_id', 0)
                ->comment('Foreign key to form_track_anything_types table');
	        $table->dateTime('date')->useCurrent()->comment('Timestamp of track created.');
	        $table->string('result')->comment('Result');
	        $table->string('comment')->nullable()->comment ('Comment on result.');
	        $table->string('notes')->nullable()->comment('Notes');

	        $table->foreign('track_anything_id')->references('id')
                ->on('form_track_anythings')->onDelete('cascade');
	        $table->foreign('track_anything_type_id')->references('id')
                ->on('form_track_anything_types')->onDelete('cascade');
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
        Schema::dropIfExists('form_track_anything_results');
    }
}
