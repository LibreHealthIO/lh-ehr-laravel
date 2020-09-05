<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates forms table.
     * Used to store forms related to patient encounter.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');

	        $table->unsignedBigInteger('encounter_id')
                ->comment('Foreign key to encounters table.');
	        $table->unsignedBigInteger('patient_id')
                ->comment('Foreign key to patients table.');
	        $table->unsignedBigInteger('user_id')
                ->comment('Foreign key to users table. User who is registering form.');

	        $table->unsignedBigInteger('form_id')
                ->index()->comment('Id of form which is related to that encounter.
                Basically this is like, an encounter for a particular patient can have many forms and a single
                 form can be related to other patient as well.');

            $table->string('form_name')->comment('Name of form, like bronchitis, ankle injury, etc.');


            $table->boolean('is_authorized')->default(0)
                ->comment('Is form authorized by physician or doctor? 0 -> No, 1 -> yes');

	        $table->boolean('is_deleted')->default(0)
                ->comment('Is form deleted from patient encounter? 0 -> No, 1 -> yes');

	        $table->text('form_directory')->nullable()->comment('Directory of form.');

	        $table->foreign('encounter_id')->references('id')
                ->on('encounters')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            // created_at/updated_at will be used to track date the form was registered with the particular user
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
        Schema::dropIfExists('forms');
    }
}
