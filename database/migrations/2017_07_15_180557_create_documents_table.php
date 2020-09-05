<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates documents table.
     * From UI, Select Patient -> Documents.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->comment('Foreign key to patients table.');
            $table->unsignedBigInteger('owner_id')->comment('Foreign key to users table.');
            $table->unsignedBigInteger('list_id')->nullable()->comment('Foreign key to lists table.');
            $table->unsignedBigInteger('encounter_id')->nullable()
                ->comment('Foreign key to form_encounters table.');
            $table->unsignedBigInteger('audit_master_id')->nullable()
                ->comment('Foreign key to audit_masters table.');

            $table->string('url')->comment('Path of uploaded file.');
            $table->string('mimetype')->comment('Type of uploaded file. Image or text.');
            $table->dateTime('revision')->useCurrent()->comment('Timestamp when document was revised.');
            $table->dateTime('doc_date')->comment('When document was uploaded.');
            $table->string('hash')->comment('40 character SHA-1 hash of document.');
            $table->boolean('imported')->default(0)
                ->comment('Parsing status for CCR/CCD/CCDA importing. 0 -> False | 1 -> True');
            $table->boolean('encounter_check')->default(0)
                ->comment('If encounter is created while tagging. 0 -> No | 1 -> Yes');

                /* TODO This will remove the need of notes table.*/
            $table->text('notes')->nullable()->comment('Notes related to documents.');
            $table->tinyInteger('audit_master_approval_status')->default(1)
                ->comment('approval_status from audit_master table.');

            $table->foreign('patient_id')->references('id')
                ->on('patients')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('list_id')->references('id')
                ->on('lists')->onDelete('cascade');
            $table->foreign('encounter_id')->references('id')
                ->on('encounters')->onDelete('cascade');
            $table->foreign('audit_master_id')->references('id')
                ->on('audit_masters')->onDelete('cascade');

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
        Schema::dropIfExists('documents');
    }
}
