<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * Create users table.
     * This will store the information from Administartion->Users->Add User.
     * @author Priyanshu Sinha <pksinha217@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->comment('User First Name.');
            $table->string('middle_name')->nullable()->comment('User Middle Name.');
            $table->string('last_name')->comment('User Last Name.');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->date('dob')->nullable()->comment('Date of Birth');
            $table->string('profile_picture')->nullable()->comment('Profile Picture');
            $table->string('address_one')->nullable()->comment('Address One');
            $table->string('address_two')->nullable()->comment('Address Two');
            $table->string('zip')->nullable()->comment('Zip code');


            // Miscellaneous properties
            $table->string('suffix')->comment('User Suffix e.g Dr, PHD, Mr, Mrs');
            $table->string('federal_tax_id')->unique()->comment('Federal Tax ID');
            $table->string('federal_drug_id')->unique()->comment('Federal Drug ID. DEA Number');
            $table->string('taxonomy')->comment('Taxonomy');
            $table->boolean('in_calendar')->default(1)
                ->comment('If user wants calendar or not. 0 -> No | 1 -> Yes');
            $table->integer('see_auth')
                ->comment('See Authorization. 0 -> None | 1 -> All | 2 -> Only Mine');
            $table->string('calendar_ui')
                ->comment('Calendar Preference. viz Outlook, Original and Fancy');
	        $table->bigInteger('npi')->comment('National Provider Identifier.');
	        $table->longText('info')->nullable()->comment('About/Biography/Job Description');

	        // TODO Move to ACL (laratrust)
	        $table->string('new_crop_user_role')
                ->comment('Role of created user. Like admin, nurse, doctor, etc.');
	        $table->string('access_control')
                ->comment('Access Control of user. Viz Accounting, Administrators, Clinicians, etc.');

            // status & verifications
            $table->boolean('active')->default(0)
                ->comment('Is user active? 0 -> No, 1 -> Yes.');
            $table->boolean('authorized')->default(0)
                ->comment('Is user authorised? 0 -> No, 1 -> Yes.');

            $table->timestamp('email_verified_at')->nullable()->comment('Email verified');
            $table->timestamp('phone_verified_at')->nullable()->comment('Phone verified');

            // two_auth & tokens
            $table->boolean('two_factor_auth')->default(false)
                ->comment('Two factor auth enabled');
            $table->string('two_factor_token')->nullable()->comment('Two factor auth token');
            $table->datetime('two_factor_expiry')->nullable()->comment('Two factor expiry date');
            $table->timestamp('pwd_expiration_date')->useCurrent()
                ->comment('Set password expiration date. Initially it is set from globals.');

            // Country foreign key
            $table->unsignedBigInteger('country_id')->nullable()->default(167)
                ->comment('User\'s country');
            $table->foreign('country_id')->references('id')
                ->on('world_countries')->onUpdate('cascade')->onDelete('set null');

            // City foreign key
            $table->unsignedBigInteger('city_id')->nullable()->comment('User\'s city');
            $table->foreign('city_id')->references('id')
                ->on('world_cities')->onUpdate('cascade')->onDelete('set null');

            // deactivation, deletion and banning
            $table->boolean('schedule_delete')->default(false)
                ->comment('Schedule for permanent delete');
            $table->boolean('schedule_deactivate')->default(false)
                ->comment('Schedule for deactivation');
            $table->timestamp('banned_until')->nullable()->comment('Time for account to be banned!');

            // Timezones and currencies
            $table->string('timezone')->default('UTC')->nullable()
                ->comment('User\'s Timezone');
            $table->string('currency')->default(config('platform_settings.default_currency'))
                ->comment('User\'s Currency');

            // Device tokens
            $table->string('device_id')->nullable();

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
        Schema::dropIfExists('users');
    }
}
