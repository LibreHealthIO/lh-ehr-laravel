<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormVitalsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates form_vitals table.
     * From UI, Select Patient -> Encounter -> Clinical -> Vitals. |
     * Select Patient -> Encounter -> Patient/Client -> Visit Forms -> Vitals.
     * @author Priyanhsu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('form_vitals', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('encounter_id')
                ->comment('Foreign key to form_encounters table');
            $table->unsignedBigInteger('patient_id')->comment ('Foreign Key to patients table.');
            $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');
            $table->unsignedBigInteger('provider_id')->index()->comment('Initially provider is set
            to be user, but when an encounter has a fee sheet filled out (billing table items are associated with
            that encounter number) then the fee sheet sets the Provider fields to equal the Rendering Provider choice
            in the fee sheet');

            $table->dateTime('date')->comment('Date when this form filled.');
            $table->boolean('authorized')->default(0)
                ->comment('Means a clinician (physician, etc...) has verified this form as part
                of the client record');
            $table->boolean('activity')->default(1)
                ->comment('A delete flag. 0 -> Yes | 1 -> No');
	        $table->float('bps', 5, 2)->default(0.00)
                ->comment('BP Systolic');
	        $table->float('bpd', 5, 2)->default(0.00)
                ->comment('BP Diastolic');
	        $table->float('weight', 5, 2)->default(0.00)
                ->comment('Weight of Patient.');
	        $table->float('height', 5, 2)->default(0.00)
                ->comment('Height of Person.');
	        $table->float('temperature', 5, 2)->default(0.00)
                ->comment('Temperature');
	        $table->float('temp_method')->nullable()->comment('Temp Location');
	        $table->float('pulse', 5, 2)->default(0.00)
                ->comment('Pulse Rate');
	        $table->float('respiration', 5, 2)->default(0.00)
                ->comment ('Respiration');
	        $table->float('bmi', 5, 2)->default(0.00)->comment('Body Mass Index');
	        $table->float('waist_circumference', 5, 2)->default(0.00)
                ->comment('Waist Circumference');
	        $table->float('head_circ', 5, 2)->default(0.00)
                ->comment('Head Circumference');
	        $table->float('oxygen_saturation')->default(0.00)
                ->comment('Percentage Oxygen Saturation');
	        $table->integer('external_id', 0)->unsigned()->nullable()
                ->comment('To hold an ID number from some other system, such as another EHR, an assigned ID
                that exists on a proprietary medical device or the like.');

	        $table->text('note')->nullable()->comment('Note');
            $table->text('BMI_status')->nullable()->comment('BMI status.');

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
        Schema::dropIfExists('form_vitals');
    }
}
