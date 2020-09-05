<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormBronchitisTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_bronchitis table.
     * From UI, Select Patient -> Encounter -> Miscellaneous -> Bronchitis Form. |
     * Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Bronchitis Form.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_bronchitis', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('encounter_id')->comment('Foreign key to form_encounters table.');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->integer('provider_id')->index()
                ->comment('Initially provider is set to be user, but when an encounter has a fee sheet
                filled out (billing table items are associated with that encounter number) then the fee sheet sets
                the Provider fields to equal the Rendering Provider choice in the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of the
                client record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
            $table->date('date_of_illness')
                ->comment('Bronchitis date of illness.');
            $table->text('hpi')->nullable()
                ->comment('HPI');
            $table->boolean('ops_fever')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_cough')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_dizziness')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_chest_pain')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_dyspnea')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_sweating')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_wheezing')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_malaise')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('ops_sputum')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->text('ops_appearance')->nullable(0)
                ->comment('Appearance');
            $table->boolean('ops_all_reviewed')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('review_of_pmh')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('review_of_allergies')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('review_of_sh')->default(0)
                ->comment('0 -> No | 1 -> Yes | Social History');
            $table->boolean('review_of_fh')->default(0)
                ->comment('0 -> No | 1 -> Yes | Family History');
            $table->boolean('tms_normal_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_normal_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_normal_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_normal_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_thickened_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_thickened_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_af_level_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_af_level_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_swelling_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_swelling_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_discharge_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('nares_discharge_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_bulging_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_bulging_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_perforated_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_perforated_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('tms_nares_not_examined')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('no_sinus_tenderness')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_normal')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('sinus_tenderness_frontal_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('sinus_tenderness_frontal_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_erythema')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_exudate')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_abscess')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_ulcers')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('sinus_tenderness_maxillary_right')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('sinus_tenderness_maxillary_left')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->text('oropharynx_appearance')->nullable()
                ->comment('Oropharnyx Appearance');
            $table->boolean('sinus_tenderness_not_examined')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('oropharynx_not_examined')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('heart_pmi')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('heart_s3')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('heart_s4')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('heart_click')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('heart_rub')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->text('heart_murmur')->nullable()
                ->comment('Murmur');
            $table->text('heart_grade')->nullable()
                ->comment('Grade');
            $table->text('heart_location')->nullable()
                ->comment('Location');
            $table->boolean('heart_normal')->default(0)
                ->comment('0 -> No | 1 -> Yes | Normal Cardiac Exam');
            $table->boolean('heart_not_examined')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_bs_normal')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_bs_reduced')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_bs_increased')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_crackles_LLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_crackles_RLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_crackles_BLL')->default(0)
                ->comment('0 -> No | 1 -> Yes | Bilateral');
            $table->boolean('lungs_rubs_LLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_rubs_RLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_rubs_BLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_wheezes_LLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_wheezes_RLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_wheezes_BLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('lungs_wheezes_DLL')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->string('diagnostic_tests')->nullable()
                ->comment('0 -> No | 1 -> Yes');

            $table->string('diagnosis1_form')->nullable()->comment('Diagnosis_1');
            $table->string('diagnosis2_form')->nullable()->comment('Diagnosis_2');
            $table->string('diagnosis3_form')->nullable()->comment('Diagnosis_2');
            $table->string('diagnosis4_form')->nullable()->comment('Diagnosis_4');

            $table->string('additional_diagnosis')->nullable()->comment('Additional Diagnosis');
            $table->text('treatment')->nullable()->comment('Treatment');

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
        Schema::dropIfExists('form_bronchitis');
    }
}
