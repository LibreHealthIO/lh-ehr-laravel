<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates drug_templates table.
     * From UI, Inventory -> Management.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('drug_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('drug_id', 0)
                ->comment('Foreign Key to drugs table.');
	        $table->string('selector')->unique()->comment('Selector. Name of Template.');
	        $table->string('dosage')->comment('Schedule.');
	        $table->unsignedBigInteger('period')->default(0)->comment('Interval');
	        $table->unsignedBigInteger('quantity')->default(0)->comment('Quantity');
	        $table->unsignedBigInteger('refills')->default(0)->comment('Refills');

            /* TODO This field can be dropped.*/
	        $table->string('tax_rates')->nullable()->comment('Tax Rate.');
	        $table->foreign('drug_id')->references('id')
                ->on('drugs')->onDelete('cascade');
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
        Schema::dropIfExists('drug_templates');
    }
}
