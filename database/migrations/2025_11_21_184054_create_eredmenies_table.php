<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('eredmenies', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pilota_id');
        $table->unsignedBigInteger('gp_id');
        $table->integer('pozicio')->nullable();
        $table->integer('pont')->nullable();
        $table->timestamps();

        $table->foreign('pilota_id')
              ->references('id')->on('pilotas')
              ->onDelete('cascade');

        $table->foreign('gp_id')
              ->references('id')->on('gps')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('eredmenies');
}


};
