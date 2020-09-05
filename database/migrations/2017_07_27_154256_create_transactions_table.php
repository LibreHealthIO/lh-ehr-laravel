<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates transactions table.
     * Stores all transactions except referral related.
     * From UI, Select Patient -> Transactions.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('patient_id')->unsigned()->comment('Foreign key to patients table');
            $table->unsignedBigInteger('user_id')->unsigned()->comment('Foreign key to users table.');
            $table->boolean('is_authorized')->default(0)->comment('0 -> False | 1 -> True');
	        $table->json('data')->comment('Data of other transactions.');
            /**
             * Eg :
             * [
             *	{
             *		type : patient_request,
             *		data : <body content>,
             *		<user_created_field> : <value>
             *	}
             * ]
             */
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
        Schema::dropIfExists('transactions');
    }
}
