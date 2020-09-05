<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTfFiltersTable extends Migration
{
    /**
     * Run the migrations.
     * Creates tf_filters table.
     * From UI, Administration -> Filters.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @author Mua N. Laurent <muarachmann@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('tf_filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by')
                ->comment('User who created this filter. Foreign key to users table.');
            $table->unsignedBigInteger('updated_by')
                ->comment('User who updated this filter. Foreign key to users table.');

            $table->boolean('requesting_action')->default(0)->comment('1 -> Allow | 0 -> Deny');
            $table->boolean('requesting_type')->default(0)->comment('1 -> Group | 0 -> User');
            $table->string('requesting_entity')->comment('Group name or username of the source');
            $table->boolean('object_type')->default(0)
                ->comment('0 -> Tag | 1 -> Patient. Filter object type');
            $table->text('note')->nullable()->comment('Note about filter.');

            // Need to update later on. TODO
            $table->unsignedInteger('gacl_aro')->default(0)
                ->comment('Gacl Field');
            $table->unsignedInteger('gacl_acl')->default(0)
                ->comment('Gacl Field');


            $table->dateTime('effective_datetime')->useCurrent()
                ->comment('Timestamp when filter is active.');
            $table->dateTime('expiration_datetime')->useCurrent()
                ->comment('Timestamp till filter is active');

            $table->unsignedInteger('priority')
                ->comment('Priority of filter.');
            $table->boolean('deleted')->default(0)
                ->comment('Is filter deleted. 0 -> No  | 1 -> Yes');

	        $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')
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
        Schema::dropIfExists('tf_filters');
    }
}
