<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     * This creates categories_to_documents table.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('categories_to_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('category_id', 0)
                ->comment('Foreign Key to categories table.');
	        $table->unsignedBigInteger('document_id', 0)
                ->comment('Foreign key to Documents table.');

	        $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
	        $table->foreign('document_id')->references('id')
                ->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('categories_to_documents');
    }
}
