<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates categories table.
     * From UI, Administration -> Practice -> Documents -> 'Select Any Category' -> Add Category.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('name')->comment = "Category name.";
	        $table->unsignedInteger('parent')->default(0)
                ->comment('"Parent of sub directory. Category directory is root and hence it will have parent as 0.');
	        $table->unsignedInteger('left')->default(0)->comment('Left Subtree.');
	        $table->unsignedInteger('right')->default(0)->comment('Right Subtree');
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
        Schema::dropIfExists('categories');
    }
}
