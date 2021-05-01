<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matakuliah')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_ruang')->unsigned();
            $table->foreign('id_ruang')->references('id')->on('ruangan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hari');
            $table->string('jenis_kelas');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->date('tanggal_mulai');
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
        Schema::dropIfExists('jadwal');
    }
}
