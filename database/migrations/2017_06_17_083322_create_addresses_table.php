<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     * Create addresses table.
     * It will store the addresse.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('line1')->comment('Line 1 of address.');
	        $table->string('line2')->nullable()->comment('Line 2 of address. Optional');
	        $table->string('state')->comment('State');
	        $table->string('zip')->comment('Zip Code');
	        $table->string('plus_four')->comment('Plus four code. US specific thing');

            // City foreign key
            $table->unsignedBigInteger('city_id')->nullable()->comment('Address city');
            $table->foreign('city_id')->references('id')
                ->on('world_cities')->onUpdate('cascade')->onDelete('set null');

            // Country foreign key
            $table->unsignedBigInteger('country_id')->nullable()->default(167)
                ->comment('Address country');
            $table->foreign('country_id')->references('id')
                ->on('world_countries')->onUpdate('cascade')->onDelete('set null');


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
        Schema::dropIfExists('addresses');
    }
}
