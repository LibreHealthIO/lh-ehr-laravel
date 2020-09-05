<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTfPatientTagsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates tf_patient_tags table.
     * From UI. Select patient -> Tags (Edit). This is linked to tf_tags table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('tf_patient_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('created_by')
                ->comment('User who created this tag. Foreign key to users table.');
            $table->unsignedBigInteger('updated_by')
                ->comment('User who updated this tag. Foreign key to users table.');
	        $table->unsignedBigInteger('tag_id')
                ->comment('Foreign key to tf_tags table.');
	        $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');

	        $table->boolean('status')->default(0)
                ->comment('0 -> In-active | 1 -> active');

	        $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('tag_id')->references('id')
                ->on('tf_tags')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('tf_patient_tags');
    }
}
