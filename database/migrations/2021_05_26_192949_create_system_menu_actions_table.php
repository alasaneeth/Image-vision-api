<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMenuActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menu_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->bigInteger('system_page_group_code');
            $table->bigInteger('system_page_code');
            $table->boolean('insert');
            $table->boolean('update');
            $table->boolean('print');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign("system_page_group_code")->references("code")->on("system_page_groups")->onDelete("cascade");

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
        Schema::dropIfExists('system_menu_actions');
    }
}
