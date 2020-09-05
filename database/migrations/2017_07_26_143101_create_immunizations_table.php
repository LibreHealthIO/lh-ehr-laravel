<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmunizationsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates immunizations table.
     * It stores immunizations related information of patients.
     * From UI, Select Patient -> Immunizations.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('immunizations', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
	        $table->unsignedBigInteger('administered_by')->comment('Foreign key to users table.');
	        $table->unsignedBigInteger('created_by')
                ->comment('User who created record. Foreign key to users table.');
	        $table->unsignedBigInteger('updated_by')
                ->comment('User who updated record. Foreign key to users table.');
	        $table->dateTime('administered_date')->useCurrent()->comment('Date when administered.');

            /* Uncomment this to use. */
            //$table->unsignedBigInteger('immunization_id')->comment('Immunization ID');

            $table->unsignedBigInteger('cvx_code')->unsigned()->comment('CVX Code Number');
            $table->string('manufacturer')->nullable()->comment('Manufacturer');
            $table->string('lot_number', 50)->nullable()->unique()
                ->comment('LOT Number of Vaccine.');
            $table->dateTime('education_date')->nullable()
                ->comment('Date when Immunization Information Statements Given.');
            $table->date('vis_date')->nullable()->comment('Date of VIS statement.');
            $table->text('note')->nullable()->comment('Note about immunization.');
            $table->float('amount_administered', 5, 2)
                ->default(0.00)->comment('Amount of vaccine administered.');
            $table->string('amount_administered_unit', 50)->default('mg')
                ->comment('Unit in which vaccine administered.');
            $table->dateTime('expiration_date')->nullable()->comment('Date when vaccine expires.');
            $table->string('route')->nullable()->comment('Route for administration.');
            $table->string('administration_site', 100)->nullable()
                ->comment('Administration Site');
            $table->boolean('added_erroneously')->default(0)
                ->comment('0 -> False | 1 -> True');
            $table->unsignedBigInteger('external_id', 0)->nullable()
                ->comment('To hold an ID number from some other system, such as another EHR, an assigned ID
                that exists on a proprietary medical device or the like.');
            $table->integer('status', 0)->default(0)
                ->comment('0 -> None | 1 -> Completed | 2 -> Refused | 3 -> Not Administered |
                4 -> Partially Administered');

            // TODO Future use ***(information_source, refusal_reason, ordering_provider)***
            $table->string('information_source')->nullable()->comment('Information Source');
            $table->string('refusal_reason')->nullable()->comment('Refusal Reason');

            // It can be foreign key to users. (future use)
            $table->unsignedBigInteger('ordering_provider_id', 0)->nullable()
                ->comment('Ordering Provider');

            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
	        $table->foreign('administered_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');
	        $table->foreign('updated_by')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('ordering_provider_id')->references('id')
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
        Schema::dropIfExists('immunizations');
    }
}
