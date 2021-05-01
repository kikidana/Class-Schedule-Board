<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenMatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen_matkul', function (Blueprint $table) {
            $table->integer('id_dosen')->unsigned();
            $table->integer('id_matkul')->unsigned();
            $table->primary(['id_dosen', 'id_matkul']);
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matkul')->references('id')->on('matakuliah')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dosen_matkul');
    }
}
