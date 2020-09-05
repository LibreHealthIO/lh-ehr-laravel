<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityUsersTable extends Migration
{
    /**
     * Run the migrations.
     * Creates user_facility_links table.
     * This links facility with user and vice-versa i.e, many to many relationship.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('facility_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_default')->default(0)
                ->comment('Is the current facility default? Note that it must be updated if any edit in UI.');

            $table->unsignedBigInteger('user_id')->comment('User Id');
            $table->unsignedBigInteger('facility_id')->comment('Facility Id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')
                ->onDelete('cascade');

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
        Schema::dropIfExists('facility_users');
    }
}
