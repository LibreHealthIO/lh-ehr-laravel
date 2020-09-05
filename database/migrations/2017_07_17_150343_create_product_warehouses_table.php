<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates product_warehouses table.
     * It stores the warehouse information of drugs.
     * From UI, Inventory -> Management.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('product_warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('drug_id')->comment('Foreign key to Drugs table.');
	        $table->string('warehouse')->comment('Warehouse');
	        $table->float('min_level', 5, 2)
                ->default(0.00)->comment('Min Level');
	        $table->float('max_level', 5, 2)
                ->default(0.00)->comment('Max Level');

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
        Schema::dropIfExists('product_warehouses');
    }
}
