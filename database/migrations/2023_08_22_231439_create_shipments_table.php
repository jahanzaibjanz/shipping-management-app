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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipper_id'); 
            $table->foreign('shipper_id')->references('id')->on('shippers');
            $table->unsignedBigInteger('client_id'); 
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('shipping_line_id'); 
            $table->foreign('shipping_line_id')->references('id')->on('shipping_lines');
            $table->unsignedBigInteger('agent_id'); 
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->string('origin');
            $table->text('destination');
            $table->date('shipment_date');
            $table->date('delivery_date');
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
        Schema::dropIfExists('shipments');
    }
};
