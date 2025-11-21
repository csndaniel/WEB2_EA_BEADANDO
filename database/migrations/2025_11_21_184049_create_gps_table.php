<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('gps', function (Blueprint $table) {
        $table->id();
        $table->date('datum');
        $table->string('nev');
        $table->string('helyszin');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('gps');
}


};
