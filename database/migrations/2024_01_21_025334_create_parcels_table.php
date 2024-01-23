<?php

use App\Enums\MultiPurposeStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->bigInteger('customer_code')->nullable();
            $table->float('weight')->nullable();
            $table->dateTime('delevery_date')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->bigInteger('from_location_code')->nullable();
            $table->bigInteger('to_location_code')->nullable();
            $table->bigInteger('route_code')->nullable();
            $table->boolean('status')->default(MultiPurposeStatus::PENDING);
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
        Schema::dropIfExists('parcels');
    }
}
