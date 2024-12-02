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
        Schema::create('penindakan', function (Blueprint $table) {
            $table->id('id_penindakan');
            $table->unsignedBigInteger('id_keluhan');
            $table->dateTime('tgl_penindakan');
            $table->text('tanggapan');
            $table->unsignedBigInteger('id_petugas');
    
            $table->timestamps();
    
            $table->foreign('id_keluhan')->references('id_keluhan')->on('keluhan');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penindakan');
    }
};
