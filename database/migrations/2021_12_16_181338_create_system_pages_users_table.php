<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPagesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_pages_users', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigInteger('system_page_code')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("system_page_code")->references("code")->on("system_pages")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_pages_users');
    }
}
