<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_invited', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->comment('User First Name.');
            $table->string('middle_name')->nullable()->comment('User Middle Name.');
            $table->string('last_name')->comment('User Last Name.');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('license')->nullable();
            $table->string('provider_type')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('facility')->nullable();


            // Miscellaneous properties
            $table->string('suffix')->comment('User Suffix e.g Dr, PHD, Mr, Mrs');
            $table->string('federal_tax_id')->unique()->comment('Federal Tax ID');
            $table->string('federal_drug_id')->unique()->comment('Federal Drug ID. DEA Number');
            $table->string('taxonomy')->comment('Taxonomy');
	        $table->bigInteger('npi')->comment('National Provider Identifier.')->default(0);
	        $table->longText('info')->nullable()->comment('About/Biography/Job Description');
	        $table->string('access_control')
                ->comment('Access Control of user. Viz Accounting, Administrators, Clinicians, etc.');

            // remember tokens and timestamps
            $table->softDeletes();
            $table->rememberToken()->comment('Remember me token');
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
        Schema::dropIfExists('users_invited');
    }
};
