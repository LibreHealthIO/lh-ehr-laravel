<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates calendar_categories table..
     * Stores the category. It's fields will be updated later on.
     * @author Priyanhsu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann @gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('calendar_categories');
    }
}
