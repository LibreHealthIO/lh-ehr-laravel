<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates pharmacies table.
     * It stores pharmacy related records.
     * From UI, Administration -> Practice -> Pharmacies.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('address_id', 0)
                ->nullable()->comment('Foreign key to addresses table.');
	        $table->string('name', 100)->comment('Name');
	        $table->string('email')->nullable()->unique()->comment('Email ID.');
	        $table->string('phone')->nullable()->comment('Phone Number.');
	        $table->string('website')->nullable()->comment('Phone Number.');
	        $table->string('fax_number')->nullable()->comment('Fax number.');
	        $table->integer('transit_method')->default(1)
                ->comment('Method of Transit. 1 -> Print | 2 -> Email | 3 -> Fax');

	        $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('pharmacies');
    }
}
