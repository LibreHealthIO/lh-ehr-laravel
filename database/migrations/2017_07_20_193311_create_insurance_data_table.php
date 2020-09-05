<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceDataTable extends Migration
{
    /**
     * Run the migrations.
     * This creates insurance_datas table.
     * Stores insurance information of patients.
     * From UI, Add/Edit Patient (Demographics) -> Insurance.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type')
                ->default(0)->comment('Insurance data. 0 -> Primary | 1 -> Secondary | 2 -> Tertiary');
	        $table->unsignedBigInteger('provider_id')
                ->comment('Foreign key to insurance_companies table.');
	        $table->unsignedBigInteger('subscriber_address_id')->nullable()
                ->comment('Address of Subscriber. Foreign key to addresses table.');
	        $table->unsignedBigInteger('employer_address_id')->nullable()
                ->comment('Address of employer. Foreign key to addresses table.');
	        $table->unsignedBigInteger('patient_id')
                ->comment('Foreign Key to patients table.');

	        $table->string('plan_name')->comment('Insurance Plan.');
	        $table->string('policy_number')->comment('Policy Number.');
	        $table->string('group_number')->comment('Group Number');

            $table->string('subscriber_first_name')->comment('Subscriber\'s First Name.');
            $table->string('subscriber_last_name')->comment('Subscriber\'s Last name.');
	        $table->string('subscriber_middle_name')->nullable()
                ->comment('Subscriber\'s Middle name.');
	        $table->string('subscriber_relationship')
                ->comment('Relationship of subscriber with patient.');
	        $table->date('subscriber_dob')->comment('Date of birth of subscriber.');
	        $table->string('subscriber_sex')->comment('Sex of subscriber.');
	        $table->string('subscriber_phone')->nullable()->comment('Phone number of subscriber.');
	        $table->string('subscriber_employer')->nullable()->comment('Employer of subscriber.');

	        $table->string('copay')->nullable()->comment('Co Pay');

	        $table->date('sDate')->comment('Start date of insurance.');
	        $table->date('eDate')->comment('End date of insurance');

	        $table->boolean('accept_assignment')->default(0)
                ->comment('0 -> False | 1 -> True');
	        $table->string('policy_type')->comment('Policy Type');
	        $table->boolean('inactive')->default(0)
                ->comment('Is insurance active? 0 -> False | 1 -> True');
	        $table->dateTime('inactive_time')->useCurrent()
                ->comment('Time since inactive.');

	        $table->foreign('provider_id')->references('id')
                ->on('insurance_companies')->onDelete('cascade');
	        $table->foreign('subscriber_address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
	        $table->foreign('employer_address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
	        $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->index('policy_number');
	        $table->index('sDate');
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
        Schema::dropIfExists('insurance_data');
    }
}
