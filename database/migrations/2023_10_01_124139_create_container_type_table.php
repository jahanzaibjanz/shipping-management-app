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
        Schema::create('containertypes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('internal_dimension');
            $table->string('door_opening');
            $table->string('cubic_capacity');
            $table->string('cargo_weight');
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
        Schema::dropIfExists('container_type');
    }
};
