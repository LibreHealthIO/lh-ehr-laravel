<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates referral_transactions table.
     * This stores transactions related to referrals.
     * From UI, Select Patient -> Transactions (Type : Referral)
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <murachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('referral_transactions', function (Blueprint $table) {
            $table->bigIncrements('id')->comment = "Primary Key. Autoincrement";

            $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table');
	        $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
	        $table->boolean('authorized')->default(0)->comment('0 -> False | 1 -> True');

	        /* Referral */
	        $table->unsignedBigInteger('refer_by')
                ->comment('User who referred this issue. Foreign key to users table.');
	        $table->unsignedBigInteger('refer_to')
                ->comment('User to whom it is referred. Foreign key to users table.');

	        $table->date('referral_date')->comment('Date when referred');
	        $table->boolean('external_referral')->default(0)
                ->comment('Is this referral external? 0 -> No | 1 -> Yes');
	        $table->text('reason')->nullable()->comment('Reason for this referral.');
	        $table->unsignedInteger('risk_level')->default(0)
                ->comment('0 -> Low | 1 -> Medium | 2 -> High');
	        $table->string('requested_service')->comment('Diagnosis Codes');
	        $table->string('referrer_diagnosis')->comment('Referrer Diagnosis');
	        $table->boolean('include_vitals')->default(0)->comment('0 -> False | 1 -> True');
	        $table->json('misc')->nullable()
                ->comment('Store User created field in key -> value pair form.');

	        /* Counter Referral */
	        $table->dateTime('reply_date')->nullable()->comment('Reply Date.');
	        $table->unsignedBigInteger('reply_from')->nullable()
                ->comment('User who replied? Foreign key to users table.');
	        $table->unsignedBigInteger('prescription_id')->nullable()
                ->comment('Prescriptions. Foreign key to prescriptions table.');
	        $table->unsignedBigInteger('document_id')->nullable()
                ->comment('Documents related ');
	        $table->string('presumed_diagnosis')->nullable()
                ->comment('Presumed Diagnosis');
	        $table->string('final_diagnosis')->nullable()
                ->comment('Final Diagnosis.');
	        $table->string('findings')->nullable()->comment('Findings.');
	        $table->string('services_provided')->nullable()->comment('Diagnosis codes provided.');
	        $table->text('recommendation')->nullable()->comment('Recommendations');

	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('refer_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('refer_to')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('reply_from')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('document_id')->references('id')
                ->on('documents')->onDelete('cascade');
	        $table->foreign('prescription_id')->references('id')
                ->on('prescriptions')->onDelete('cascade');
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
        Schema::dropIfExists('referral_transactions');
    }
}
