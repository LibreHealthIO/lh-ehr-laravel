<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAnnotateDiagramsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates form_annotate_diagrams table.
     * This stores annotated data over an image.
     * From UI, Select Patient -> Encounter -> Clinical -> Annotate Diagram. |
     * Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Annotate Diagram.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_annotate_diagrams', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('encounter_id')->comment('Foreign key to encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->unsignedBigInteger('provider_id')->index()
                ->comment('Initially provider is set to be user, but when an encounter has a fee sheet filled
                 out (billing table items are associated with that encounter number) then the fee sheet sets the
                 Provider fields to equal the Rendering Provider choice in the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of
                the client record');

            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
	        $table->text('data')->nullable()->comment('Annotated Data.');
	        $table->string('image_data')->nullable()->comment('Image Data directory');
	        $table->string('dyn_title')->comment('Diagram name');

	        $table->foreign('encounter_id')->references('id')
                ->on('encounters')->onDelete('cascade');
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
        Schema::dropIfExists('form_annotate_diagrams');
    }
}
