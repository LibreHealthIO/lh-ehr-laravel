<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcd10ReimbrDx910sTable extends Migration
{
    /**
     * Run the migrations.
     * This structure can be modified or dropped later on.
     * This creates icd10_reimbr_dx910s table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('icd10_reimbr_dx910s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 8)->nullable()->comment('Code.');
            $table->tinyInteger('code_cnt')->nullable()->comment('');
            $table->string('ICD9_01', 5)->nullable()->comment('');
            $table->string('ICD9_02', 5)->nullable()->comment('');
            $table->string('ICD9_03', 5)->nullable()->comment('');
            $table->string('ICD9_04', 5)->nullable()->comment('');
            $table->string('ICD9_05', 5)->nullable()->comment('');
            $table->string('ICD9_06', 5)->nullable()->comment('');
            $table->boolean('active')->default(0)
                ->comment('Is code active? 0 -> No | 1 -> Yes');
            $table->unsignedBigInteger('revision')->default(0)->comment('Code Revision');
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
        Schema::dropIfExists('icd10_reimbr_dx910s');
    }
}
