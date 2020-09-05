<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcd10GemPcs910sTable extends Migration
{
    /**
     * Run the migrations.
     * This creates icd10_gem_pcs910s table.
     * From UI, Administration -> Other -> External Data Load -> ICD10.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('icd10_gem_pcs910s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pcs_icd9_source', 7)->nullable()->comment('ICD 9 Source.');
            $table->string('pcs_icd10_target', 5)->nullable()->comment('ICD 10 target.');
            $table->string('flags', 5)->nullable()->comment('Flags');
            $table->boolean('active')->default(0)
                ->comment('Is code active? 0 -> No  | 1 -> Yes');
            $table->unsignedBigInteger('revision')->default(0)->comment('Revision of code.');
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
        Schema::dropIfExists('icd10_gem_pcs910s');
    }
}
