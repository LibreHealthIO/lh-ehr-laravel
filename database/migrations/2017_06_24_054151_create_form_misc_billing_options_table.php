<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormMiscBillingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_misc_billing_options table.
     * From UI, Select Patient -> Encounter -> Administration -> Misc Billing Option HCFA. |
     * Select Patient -> Encounter -> Patient/CLient -> Visit Forms -> Misc Billing Option HCFA.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_misc_billing_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encounter_id')
                ->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->integer('provider_id')->index()
                ->comment('Initially provider is set to be user, but when an encounter has a fee sheet
                filled out (billing table items are associated with that encounter number) then the fee sheet sets
                the Provider fields to equal the Rendering Provider choice in the fee sheet');


            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part of
                 the client record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
            $table->boolean('employment_related')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->boolean('auto_accident')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->string('accident_state', 2)
                ->comment('Accident State Code');
            $table->boolean('other_accident')->default(0)
                ->comment('0 -> No | 1 -> Yes');
            $table->string('medicaid_referral_code', 2)->nullable()
                ->comment('Medical Referral Code. In UI it is EPSDT Referral Code.');
            $table->boolean('epsdt_flag')->default(0)
                ->comment('EPSDT Flag');
            $table->string('provider_qualifier_code', 2)->nullable()
                ->comment('Provider Qualifier Code');
            $table->boolean('is_outside_lab')->default(0)
                ->comment('Outside Lab Used? 0 -> No | 1 -> Yes');
            $table->decimal('lab_amount', 5, 2)->default(0.00)
                ->comment('Lab Cost');
            $table->boolean('is_unable_to_work')->default(0)
                ->comment('Unable to work. 0- > No | 1 -> Yes');

            $table->dateTime('off_work_from')->nullable()->comment('Date when not able to work.');
            $table->dateTime('off_work_to')->nullable()
                ->comment('Date till not able to work. It is to be noticed that if this field
                ( and off_work_from) is filled then only is_unable_to_work is true else not.');

            $table->boolean('is_hospitalised')->default(0)
                ->comment('Is patient hospitalised? 0 -> No | 1 -> Yes');
            $table->dateTime('hospitalization_date_from')->nullable()
                ->comment('Date when hospitalised.');
            $table->dateTime('hospitalization_date_to')->nullable()
                ->comment('Date till hospitalised. If this and hospitalization_date_from is filled then
                only is_hospitalised is true.');

            $table->string('medicaid_resubmission_code', 10)->nullable()
                ->comment('ICD9 Code');
            $table->string('medicaid_original_reference', 15)->nullable()
                ->comment('Reference Number');
            $table->string('prior_auth_number')
                ->comment('Authorization Number.');
            $table->string('comments')->nullable()
                ->comment('Comment');
            $table->boolean('replacement_claim')->default(0)
                ->comment('X12 Replacement Claim');
            $table->string('icn_resubmission_number')
                ->comment('X12 ICN Resubmission Number');
            $table->date('box_14_date_equal')
                ->comment('onset_date from form_encounter.');

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
        Schema::dropIfExists('form_misc_billing_options');
    }
}
