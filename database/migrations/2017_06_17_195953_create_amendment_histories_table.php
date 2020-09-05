<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmendmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates amendment_histories table.
     * store the history of amendments.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('amendment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('amendment_id')->comment('Foreign key to amendments table.');
            $table->unsignedBigInteger('created_by')->comment('User who created amendment.');

	        $table->unsignedInteger('status')->comment('Amendment Status.');
	        $table->longText('notes')->nullable()->comment('Amendment Notes');

	        $table->foreign('amendment_id')->references('id')
                ->on('amendments')->onDelete('cascade');
	        $table->foreign('created_by')->references('id')
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
        Schema::dropIfExists('amendment_histories');
    }
}
