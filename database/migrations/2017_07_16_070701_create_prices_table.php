<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates prices table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('drug_id')
                ->comment('Foreign key to drugs table.');
	        $table->string('pr_selector')->nullable()
                ->comment('Template selector for drugs, empty for codes');
	        $table->string('level')->comment('Price Level');
	        $table->float('price', 10, 2)
                ->comment('Price of that drug in local currency');

	        $table->foreign('drug_id')->references('id')
                ->on('drugs')->onDelete('cascade');
	        $table->foreign('pr_selector')->references('selector')
                ->on('drug_templates')->onDelete('cascade');
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
        Schema::dropIfExists('prices');
    }
}
