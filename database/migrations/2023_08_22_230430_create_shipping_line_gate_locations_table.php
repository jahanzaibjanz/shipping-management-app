<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_line_gate_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_line_id'); 
            $table->foreign('shipping_line_id')->references('id')->on('shipping_lines');
            $table->string('location_name');
            $table->decimal('latitude');
            $table->decimal('longitude');
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
        Schema::dropIfExists('shipping_line_gate_locations');
    }
};
