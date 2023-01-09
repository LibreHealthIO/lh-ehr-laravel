<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     * Create patients table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pid')->unique('pid');
            $table->string('title')->comment('Title Mr., Ms., Mrs., etc.');
            $table->string('occupation')->comment('Patient occupation');
            $table->string('industry')->comment('Industry in which patient works.');

            $table->unsignedBigInteger('address_id')
                ->comment('Foreign key for address linking to patient.');
            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
}
