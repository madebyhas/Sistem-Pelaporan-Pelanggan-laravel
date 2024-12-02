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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id('id_proyek');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('nama_proyek', 36);
            $table->datetime('jangka_waktu_awal');
            $table->datetime('jangka_waktu_akhir');
            $table->enum('garansi', ['available', 'expired']);

            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
};
