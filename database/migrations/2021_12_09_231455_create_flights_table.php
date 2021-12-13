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
            $table->string("flight_code");
            $table->string("departure_location");
            $table->string("arrival_location");
            $table->integer("status");
            $table->string("gate");
            $table->datetime("boarding_time");
            $table->time("duration");
            $table->double("ticket_price");
            // Relation to ticket reservation
            // $table->foreignId('plane_id')->index()->constrained()->cascadeOnDelete();
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
