<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesiKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesi_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matakuliah')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id')->on('ruangan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('sesi');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->date('tanggal');
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
        Schema::dropIfExists('sesi_kelas');
    }
}
