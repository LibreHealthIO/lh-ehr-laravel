<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugSalesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates drug_sales table.
     * This table is related to prescriptions, drugs, drug_inventories, patients, form_encounters and users table.
     * From UI, Inventory -> Management.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('drug_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('drug_id')
                ->comment('Foreign key to drugs table.');
	        $table->unsignedBigInteger('inventory_id')
                ->comment('Foreign key to drug_inventories table.');
	        $table->unsignedBigInteger('prescription_id')->nullable()
                ->comment('Foreign key to prescriptions table.');
	        $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');
	        $table->unsignedBigInteger('encounter_id')->nullable()
                ->comment('Foreign key to form_encounters table.');
	        $table->unsignedBigInteger('user_id')
                ->comment('Foreign key to users table.');
	        $table->unsignedBigInteger('distributor_id')->nullable()
                ->comment('Distributor of drug. Foreign key to users table.');

	        $table->dateTime('sale_date')->comment('Date when drug is sold.');
	        $table->unsignedBigInteger('quantity')->comment('Quantity of drug sold');
	        $table->float('fee', 12, 2)->default(0.00)->comment('Fees of Drugs.');
	        $table->boolean('billed')->default(0)
                ->comment('If the sale is posted to accounting? 0 -> No | 1 -> Yes');

	        $table->text('notes')->nullable()->comment('Notes');

	        $table->foreign('drug_id')->references('id')
                ->on('drugs')->onDelete('cascade');
	        $table->foreign('inventory_id')->references('id')
                ->on('drug_inventories')->onDelete('cascade');
	        $table->foreign('prescription_id')->references('id')
                ->on('prescriptions')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('encounter_id')->references('id')
                ->on('encounters')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('distributor_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('drug_sales');
    }
}
