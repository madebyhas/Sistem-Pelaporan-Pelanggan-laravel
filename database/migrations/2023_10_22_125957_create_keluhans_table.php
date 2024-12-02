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
        Schema::create('keluhan', function (Blueprint $table) {
            $table->id('id_keluhan');
            $table->unsignedBigInteger('id_proyek');
            $table->dateTime('tgl_keluhan');
            $table->text('isi_keluhan');
            $table->string('foto');
            $table->enum('status', ['0', 'proses', 'selesai']);

            $table->timestamps();

            $table->foreign('id_proyek')->references('id_proyek')->on('proyek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluhan');
    }
};
