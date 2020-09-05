<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncountersTable extends Migration
{
    /**
     * Run the migrations.
     * Creates form_encounters table.
     * Stores all patient's encounters in this table.
     * From UI, create/find patient->New Encounter.
     * 'calendar_category_id' is used as foreign key to calendar_categories table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->bigIncrements('id');

	        $table->unsignedBigInteger('facility_id')->comment('Foreign key to facilities table.');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign key to Patients table.');
	        $table->unsignedBigInteger('provider_id')->comment('Foreign key to users table.');

	        $table->dateTime('date')->comment('Date of service.');
	        $table->text('reason')->comment('Description of this encounter.');
	        $table->string('facility')->comment('Facility Name');

	        $table->dateTime('onset_date')->useCurrent()
                ->comment('The date that the patient reports current issue is linked to.');
	        $table->string('sensitivity')
                ->comment('A flag that restrict access for VIPs or anyone who requests it.');
	        $table->text('billing_note')->nullable()
                ->comment('An accounting note that applies to just this encounter (but not the patient level,
                 or the line-item level.)');

	        $table->unsignedBigInteger('calendar_category_id')
                ->index()->comment('The encounter category which is actually from the calendar categories
                 for appointment type.');

	        $table->unsignedBigInteger('last_level_billed')->default(0)
                ->comment('Flag that tells you if billed to Primary, Secondary, Tertiary Insurance etc.
                This should be an incremental flag as payments get processed.');
	        $table->unsignedBigInteger('last_level_closed')->default(0)
                ->comment('Refer as above.');

	        $table->dateTime('last_stmt_date')->nullable()->comment('Refer as above.');

	        $table->unsignedBigInteger('supervisor_id')->index()
                ->comment('Supervising provider. If any for this visit.');
	        $table->unsignedBigInteger('ordering_physician')->index()
                ->comment('Ordering provider. If any for this visit.');
	        $table->unsignedBigInteger('referring_physician')->index()
                ->comment('Referring provider, if any, for this visit.');

	        $table->string('invoice_ref_no')->comment('Billing stuff.');


	        $table->unsignedBigInteger('referral_source')
                ->comment('Should be an ID from the users table. Can be from an address book entry.');
	        $table->unsignedBigInteger('billing_facility')
                ->comment('Facilities table billing entity.');
	        $table->unsignedBigInteger('external_id')->nullable()->comment('External ID');
	        $table->unsignedBigInteger('eft_number')->nullable()->comment('eft number.');


	        $table->string('claim_number')->nullable()->comment('Claim Number, Related to insurance');
	        $table->string('document_image')->nullable()->comment('Patient Document');
	        $table->string('sequence_number')->nullable()->comment('Sequence Number.');

	        $table->foreign('facility_id')->references('id')
                ->on('facilities')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('provider_id')->references('id')
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
        Schema::dropIfExists('encounters');
    }
}
