<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates lists table.
     * It stores medical_problem, surgery, Allergies, Medications details.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->comment('Foreign Key to patients table.');
	        $table->unsignedBigInteger('user_id')->comment('Foreign key to users table.');

	        $table->dateTime('date')->useCurrent()->comment('Timestamp when list created.');

	        $table->string('type')
                ->comment('Type of list. Medications, Allergies, Surgery, Medical Problems, etc.');
	        $table->string('title')->comment('Title of that particular type.');
	        $table->date('begin_date')->comment('Beginning date of issue.');
	        $table->date('end_date')->nullable()
                ->comment('Date of end of this issue. Null if still active.');

	        $table->unsignedBigInteger('occurrence')->default(0)
                ->comment('Occurrence of this issue. Recurrence, First, Early Recurrence, Late Recurrence,
                and Acute on Chronic.');
	        $table->string('referred_by')->nullable()
                ->comment('Who referred this issue.');
	        $table->boolean('activity')->default(0)
                ->comment('Still Active. 0 -> No | 1 -> Yes');
	        $table->text('comments')->nullable()
                ->comment('Comment about that issue.');
	        $table->unsignedBigInteger('outcome')->default(0)
                ->comment('Outcome of issue.');
	        $table->string('destination')->nullable()
                ->comment('Destination.');
	        $table->string('reaction')->comment('Reaction of that issue.');
	        $table->unsignedBigInteger('external_allergy_id', 0)->nullable()
                ->comment('External ERX Id.');
	        $table->boolean('erx_source')->default(0)
                ->comment('0 -> LibreEHR | 1 -> External');
	        $table->boolean('erx_uploaded')->default(0)
                ->comment('0 -> Pending to NewCrop upload | 1 -> Uploaded to NewCrop');
	        $table->dateTime('modified_date')->useCurrent()
                ->comment('Timestamp when issue modified.');
	        $table->string('severity_al')
                ->comment('Severity Level');

	        $table->unsignedBigInteger('external_id', 0)->nullable()
                ->comment('To hold an ID number from some other system, such as another EHR, an assigned ID
                that exists on a proprietary medical device or the like.');

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
        Schema::dropIfExists('lists');
    }
}
