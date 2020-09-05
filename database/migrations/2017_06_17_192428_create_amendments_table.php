<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmendmentsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates amendments table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('amendments', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->comment('Patient who amendment could be for.');
            $table->unsignedBigInteger('created_by')->comment('User who created amendment.');
            $table->unsignedBigInteger('modified_by')->comment('User who modified amendment.');

            $table->date('amendment_date')->comment('Amendment Date.');

	        // TODO amendment could be requested from a user... do the linking
	        $table->string('from')->comment('Amendment requested from.');

            $table->unsignedInteger('status')
                ->comment('Status. 0->rejected, 1->accepted, 2->null');
            $table->longText('description')->nullable()->comment('Description');

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')
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
        Schema::dropIfExists('amendments');
    }
}
