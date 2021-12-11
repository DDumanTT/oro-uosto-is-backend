<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("flight_code");
            $table->string("departue_location");
            $table->string("arrive_location");
            $table->integer("status");
            $table->string("gates");
            $table->datetime("boarding_time");
            $table->double("ticket_price");
            // Relation to ticket reservation
            // Relation to Airplane
            // Relation to contract
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
