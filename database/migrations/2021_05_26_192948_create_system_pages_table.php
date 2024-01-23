<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('code')->unique();
            $table->bigInteger('system_page_group_code');
            $table->string('name');
            $table->string('icon_name');
            $table->integer('order');
            $table->string('route');
            $table->dateTime('effective_date_time')->nullable();
            $table->dateTime('expiry_date_time')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign("system_page_group_code")->references("code")->on("system_page_groups")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_pages');
    }
}
