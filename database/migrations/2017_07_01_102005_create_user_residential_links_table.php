<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResidentialLinksTable extends Migration
{
    /**
     * Run the migrations.
     * This will create user_residential_links table.
     * This stores the address information of user. Many to many relationship with users and addresses table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('user_residential_links', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('address_id')
                ->comment('To create link with addresses table.');
  	        $table->unsignedBigInteger('user_id')
                ->comment('To create link with user_infos table.');

  	        $table->integer('type')->default(0)
                ->comment('What type of address is? 0 -> primary address | 1 -> alternate address.');

	        $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('user_residential_links');
    }
}
