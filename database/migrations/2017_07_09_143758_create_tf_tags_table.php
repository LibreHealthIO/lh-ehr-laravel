<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTfTagsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates tf_tags table.
     * From UI, Administration -> Tags.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('tf_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('created_by')
                ->comment('User who created this tag. Foreign key to users table.');
	        $table->unsignedBigInteger('updated_by')
                ->comment('User who updated this tag. Foreign key to users table.');
	        $table->string('tag_name')->comment('Tag Name');
	        $table->string('tag_color', 7)
                ->comment('Color used to denote this tag on layout.');

	        $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('updated_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->index('tag_name'); //Indexing tag name.
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
        Schema::dropIfExists('tf_tags');
    }
}
