<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBizxUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bizx_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->bigInteger('user_type_code')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('nic_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_verified')->default(1);
           // $table->date('email_verified_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->
            foreign("user_type_code")->
            references("code")->
            on("bizx_user_types")->
            onDelete("cascade");



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bizx_users');
    }
}
