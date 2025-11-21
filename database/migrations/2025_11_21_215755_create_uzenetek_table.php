<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('uzenetek', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('email');
            $table->text('uzenet');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('uzenetek');
    }
};
