<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) { 
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('route_name')->nullable();           
             $table->bigInteger('courier_code')->unique();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->decimal('courier_fees')->nullable();
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
        Schema::dropIfExists('routes');
    }
}
