<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAnkleInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_ankle_injuries table.
     * From UI, Select Patient -> Encounter -> Miscellaneous -> Ankle Evaluation Form. | Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Ankle Evaluation Form.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_ankle_injuries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('encounter_id')
                ->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->unsignedBigInteger('provider_id')->index()->comment('Initially provider is set to
             be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
             encounter number) then the fee sheet sets the Provider fields to equal the Rendering
             Provider choice in the fee sheet');


    	    $table->boolean('is_authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of the client
                record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
	        $table->dateTime('date')->comment('Date when this form filled.');
	        $table->dateTime('ankle_date_of_injury')->comment('Date of Injury.');
	        $table->boolean('ankle_work_related')->default(0)
                ->comment('O -> Off, 1 -> On');
	        $table->enum('ankle_foot', ['left', 'right'])->nullable()
                ->comment('Which foot is? Left or right?');
	        $table->string('ankle_severity_of_pain')->nullable()->comment('Pain Severity');
	        $table->boolean('ankle_significant_swelling')->default(0)
                ->comment('0 -> no significant swelling | 1 -> There is significant swelling.');
	        $table->string('ankle_onset_of_swelling')->nullable()
                ->comment('When swelling happened? Like within minutes or hours');
	        $table->text('ankle_how_did_injury_occur')->nullable()
                ->comment('Reason for injury.');
            $table->string('ankle_ottawa_bone_tenderness')->nullable()
                ->comment('Bone Tenderness');

	        $table->boolean('ankle_able_to_bear_weight_steps')->default(0)
                ->comment('Whether able to bear weight? 0 -> No | 1 -> Yes');

	        $table->string('ankle_x_ray_interpretation')->comment('Interpretation of X-Ray');
 	        $table->text('ankle_additional_x_ray_notes')->nullable()
                ->comment('Additional X-Ray Notes.');
	        $table->string('ankle_diagnosis_1')->nullable()->comment('Further Diagnosis.');
	        $table->string('ankle_diagnosis_2')->nullable()->comment('Further Diagnosis.');
	        $table->string('ankle_diagnosis_3')->nullable()->comment('Further Diagnosis.');
	        $table->string('ankle_diagnosis_4')->nullable()->comment('Further Diagnosis.');
	        $table->text('ankle_plan')->comment('Prescription by doctor');
	        $table->text('ankle_additional_diagnosis')->nullable()
                ->comment('Additional Diagnosis.');
	        $table->string('cpt_codes')->nullable()->comment('CPT Code');


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
        Schema::dropIfExists('form_ankle_injuries');
    }
}
