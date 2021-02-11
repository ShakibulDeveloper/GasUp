<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('restaurant_id')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('referral_id')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('role')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('city')->nullable();
            $table->string('date_joining')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('photo')->nullable();
            $table->string('role_id')->nullable();
            $table->string('store_registered')->nullable();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('descriptions')->nullable();
            $table->string('status')->nullable();
            $table->string('total_points')->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('access_token')->nullable();
            $table->boolean('validate')->default(0);
            $table->integar('marge_validation')->default(0);
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
