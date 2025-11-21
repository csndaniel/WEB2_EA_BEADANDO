<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('pilotas', function (Blueprint $table) {
        $table->id();
        $table->string('nev');
        $table->string('nemzet');
        $table->date('szulido')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('pilotas');
}


};
