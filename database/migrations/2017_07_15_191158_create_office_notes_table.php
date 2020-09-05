<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeNotesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates office_notes table.
     * From UI, Miscellaneous -> Ofc Notes.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('office_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('user_id', 0)
                ->comment('Foreign Key to users table.');
	        $table->text('body')->nullable()->comment('Note content');
	        $table->boolean('activity')->default(0)
                ->comment('Is note active? 0 -> No | 1 -> Yes');
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
        Schema::dropIfExists('office_notes');
    }
}
