<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlaneFlight extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_flight', function (Blueprint $table) {
            // $table->integer('plane_id');
            // $table->integer('flight_id');
            $table->foreignId('plane_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('flight_id')->index()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plane_flight');
    }
}
