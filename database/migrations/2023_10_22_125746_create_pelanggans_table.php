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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nama', 36);
            $table->string('nama_instansi', 36);
            $table->string('alamat_instansi', 100);
            $table->string('provinsi', 100);
            $table->string('email', 36);
            $table->string('telp', 13);
            $table->string('username', 25)->unique();
            $table->string('password');

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
        Schema::dropIfExists('pelanggan');
    }
};
