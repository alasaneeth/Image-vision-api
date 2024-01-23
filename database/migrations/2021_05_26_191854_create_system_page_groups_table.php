<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPageGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_page_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->bigInteger('system_code');
            $table->string('name');
            $table->string('icon_name');
            $table->integer('order');
            $table->string('path');
            $table->boolean('is_main');
            $table->date('effective_date_time')->nullable();
            $table->dateTime('expiry_date_time')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign("system_code")->references("code")->on("systems")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_page_groups');
    }
}
