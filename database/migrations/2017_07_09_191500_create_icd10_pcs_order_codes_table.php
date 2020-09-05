<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcd10PcsOrderCodesTable extends Migration
{
    /**
     * Run the migrations.
     * This creates icd10_dx_order_codes table.
     * From UI, Administration -> Other -> External Data Load -> ICD10.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('icd10_pcs_order_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dx_code', 10)->nullable()->comment('ICD10 Dx code');
            $table->string('formatted_dx_code', 10)->nullable()
                ->comment('Formatted DX Code');
            $table->char('valid_for_coding', 1)->nullable()
                ->comment('Is it valid for coding?');
            $table->string('short_desc', 60)->nullable()
                ->comment('Short description of that code.');
            $table->string('long_desc')->nullable()->comment('Long description of that code.');
            $table->boolean('active')->default(0)
                ->comment('Is code Active? 0 -> No | 1 -> Yes');
            $table->unsignedBigInteger('revision')->unsigned()->default(0)
                ->comment('Revision of code.');

            /*Creating Indexes*/
            $table->index('formatted_dx_code');
            $table->index('active');
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
        Schema::dropIfExists('icd10_pcs_order_codes');
    }
}
