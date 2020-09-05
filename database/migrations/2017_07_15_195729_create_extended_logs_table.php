<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtendedLogsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates extended_logs table.
     * It stores disclosures of patients.
     * From UI, Select Patient -> Disclosures (edit).
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('extended_logs', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
	        $table->unsignedBigInteger('user_id')->comment('Foreign Key to users table.');
	        $table->string('event')->comment('Type of Disclosure');
	        $table->string('recipient')->nullable()->comment('Recipient of disclosure.');
	        $table->text('description')->nullable()->comment('Description of Disclosure.');

	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('extended_logs');
    }
}
