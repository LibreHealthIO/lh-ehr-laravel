<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormRosTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_ros table.
     * From UI, Select Patient -> Encounter -> Clinical -> Review of Systems. | Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Review of Systems.
     * For unsignedInteger fields : 0 -> N/A | 1 -> Yes | 2 -> No
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_ros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encounter_id')
                ->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->unsignedBigInteger('provider')->index()->comment('Initially provider is set
            to be user, but when an encounter has a fee sheet filled out (billing table items are associated with that
            encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice in
            the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of
                the client record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');

            /*Constitutional*/
            $table->unsignedInteger('weight_change')->default(0);
            $table->unsignedInteger('weakness')->default(0);
            $table->unsignedInteger('fatigue')->default(0);
            $table->unsignedInteger('anorexia')->default(0);
            $table->unsignedInteger('fever')->default(0);
            $table->unsignedInteger('chills')->default(0);
            $table->unsignedInteger('night_sweats')->default(0);
            $table->unsignedInteger('insomnia')->default(0);
            $table->unsignedInteger('irritability')->default(0);
            $table->unsignedInteger('heat_or_cold')->default(0);
            $table->unsignedInteger('intolerance')->default(0);

            /* Eyes */
            $table->unsignedInteger('change_in_vision')->default(0);
            $table->unsignedInteger('glaucoma_history')->default(0);
            $table->unsignedInteger('eye_pain')->default(0);
            $table->unsignedInteger('irritation')->default(0);
            $table->unsignedInteger('redness')->default(0);
            $table->unsignedInteger('excessive_tearing')->default(0);
            $table->unsignedInteger('double_vision')->default(0);
            $table->unsignedInteger('blind_spots')->default(0);
            $table->unsignedInteger('photophobia')->default(0);

            /* Ears, Nose, Mouth, Throat */
            $table->unsignedInteger('hearing_loss')->default(0);
            $table->unsignedInteger('discharge')->default(0);
            $table->unsignedInteger('pain')->default(0);
            $table->unsignedInteger('vertigo')->default(0);
            $table->unsignedInteger('tinnitus')->default(0);
            $table->unsignedInteger('frequent_colds')->default(0);
            $table->unsignedInteger('sore_throat')->default(0);
            $table->unsignedInteger('sinus_problems')->default(0);
            $table->unsignedInteger('post_nasal_drip')->default(0);
            $table->unsignedInteger('nosebleed')->default(0);
            $table->unsignedInteger('snoring')->default(0);
            $table->unsignedInteger('apnea')->default(0);

            /* Breast */
            $table->unsignedInteger('breast_mass')->default(0);
            $table->unsignedInteger('breast_discharge')->default(0);
            $table->unsignedInteger('biopsy')->default(0);
            $table->unsignedInteger('abnormal_mammogram')->default(0);

            /* Respiratory */
            $table->unsignedInteger('cough')->default(0);
            $table->unsignedInteger('sputum')->default(0);
            $table->unsignedInteger('shortness_of_breath')->default(0);
            $table->unsignedInteger('wheezing')->default(0);
            $table->unsignedInteger('hemoptsyis')->default(0);
            $table->unsignedInteger('asthma')->default(0);
            $table->unsignedInteger('copd')->default(0);

            /* Cardiovascular */
            $table->unsignedInteger('chest_pain')->default(0);
            $table->unsignedInteger('palpitation')->default(0);
            $table->unsignedInteger('syncope')->default(0);
            $table->unsignedInteger('pnd')->default(0);
            $table->unsignedInteger('doe')->default(0);
            $table->unsignedInteger('orthopnea')->default(0);
            $table->unsignedInteger('peripheal')->default(0);
            $table->unsignedInteger('edema')->default(0);
            $table->unsignedInteger('legpain_cramping')->default(0);
            $table->unsignedInteger('history_murmur')->default(0);
            $table->unsignedInteger('arrythmia')->default(0);
            $table->unsignedInteger('heart_problem')->default(0);

            /* Gastrointestinal */
            $table->unsignedInteger('dysphagia')->default(0);
            $table->unsignedInteger('heartburn')->default(0);
            $table->unsignedInteger('bloating')->default(0);
            $table->unsignedInteger('belching')->default(0);
            $table->unsignedInteger('flatulence')->default(0);
            $table->unsignedInteger('nausea')->default(0);
            $table->unsignedInteger('vomiting')->default(0);
            $table->unsignedInteger('hematemesis')->default(0);
            $table->unsignedInteger('gastro_pain')->default(0);
            $table->unsignedInteger('food_intolerance')->default(0);
            $table->unsignedInteger('hepatitis')->default(0);
            $table->unsignedInteger('jaundice')->default(0);
            $table->unsignedInteger('hematochezia')->default(0);
            $table->unsignedInteger('changed_bowel')->default(0);
            $table->unsignedInteger('diarrhea')->default(0);
            $table->unsignedInteger('constipation')->default(0);

            /* Genitourinary General */
            $table->unsignedInteger('polyuria')->default(0);
            $table->unsignedInteger('polydypsia')->default(0);
            $table->unsignedInteger('dysuria')->default(0);
            $table->unsignedInteger('hematuria')->default(0);
            $table->unsignedInteger('frequency')->default(0);
            $table->unsignedInteger('urgency')->default(0);
            $table->unsignedInteger('incontinence')->default(0);
            $table->unsignedInteger('renal_stones')->default(0);
            $table->unsignedInteger('utis')->default(0);

            /* Genitourinary Male */
            $table->unsignedInteger('hesitancy')->default(0);
            $table->unsignedInteger('dribbling')->default(0);
            $table->unsignedInteger('stream')->default(0);
            $table->unsignedInteger('nocturia')->default(0);
            $table->unsignedInteger('erections')->default(0);
            $table->unsignedInteger('ejaculations')->default(0);

            /* Genitourinary Female */
            $table->unsignedInteger('g')->default(0);
            $table->unsignedInteger('p')->default(0);
            $table->unsignedInteger('ap')->default(0);
            $table->unsignedInteger('lc')->default(0);
            $table->unsignedInteger('mearche')->default(0);
            $table->unsignedInteger('menopause')->default(0);
            $table->unsignedInteger('lmp')->default(0);
            $table->unsignedInteger('f_frequency')->default(0);
            $table->unsignedInteger('f_flow')->default(0);
            $table->unsignedInteger('f_symptoms')->default(0);
            $table->unsignedInteger('abnormal_hair_growth')->default(0);
            $table->unsignedInteger('f_hirsutism')->default(0);

            /* Musculoskeletal */
            $table->unsignedInteger('joint_pain')->default(0);
            $table->unsignedInteger('swelling')->default(0);
            $table->unsignedInteger('m_redness')->default(0);
            $table->unsignedInteger('m_warm')->default(0);
            $table->unsignedInteger('m_stiffness')->default(0);
            $table->unsignedInteger('muscle')->default(0);
            $table->unsignedInteger('m_aches')->default(0);
            $table->unsignedInteger('fms')->default(0);
            $table->unsignedInteger('arthritis')->default(0);

            /* Neurologic */
            $table->unsignedInteger('loc')->default(0);
            $table->unsignedInteger('seizures')->default(0);
            $table->unsignedInteger('stroke')->default(0);
            $table->unsignedInteger('tia')->default(0);
            $table->unsignedInteger('n_numbness')->default(0);
            $table->unsignedInteger('n_weakness')->default(0);
            $table->unsignedInteger('paralysis')->default(0);
            $table->unsignedInteger('intellectual_decline')->default(0);
            $table->unsignedInteger('memory_problems')->default(0);
            $table->unsignedInteger('dementia')->default(0);
            $table->unsignedInteger('n_headache')->default(0);

            /* Skin */
            $table->unsignedInteger('s_cancer')->default(0);
            $table->unsignedInteger('psoriasis')->default(0);
            $table->unsignedInteger('s_acne')->default(0);
            $table->unsignedInteger('s_other')->default(0);
            $table->unsignedInteger('s_disease')->default(0);

            /* Psychiatric */
            $table->unsignedInteger('p_diagnosis')->default(0);
            $table->unsignedInteger('p_medication')->default(0);
            $table->unsignedInteger('depression')->default(0);
            $table->unsignedInteger('anxiety')->default(0);
            $table->unsignedInteger('social_difficulties')->default(0);

            /* Endocrine */
            $table->unsignedInteger('thyroid_problems')->default(0);
            $table->unsignedInteger('diabetes')->default(0);
            $table->unsignedInteger('abnormal_blood')->default(0);

            /* Hematologic/Allergic/Immunologic */
            $table->unsignedInteger('anemia')->default(0);
            $table->unsignedInteger('fh_blood_problems')->default(0);
            $table->unsignedInteger('bleeding_problems')->default(0);
            $table->unsignedInteger('allergies')->default(0);
            $table->unsignedInteger('frequent_illness')->default(0);
            $table->unsignedInteger('hiv')->default(0);
            $table->unsignedInteger('hai_status')->default(0);

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
        Schema::dropIfExists('form_ros');
    }
}
