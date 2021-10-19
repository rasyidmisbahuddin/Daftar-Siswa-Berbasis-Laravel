<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablejurusanSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan_siswa', function (Blueprint $table) {
            // Create tabel jurusan_siswa
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_jurusan')->unsigned()->index();
            $table->timestamps();

            // Set PK
            $table->primary(['id_siswa', 'id_jurusan']);

            // Set FK jurusan_siswa --- siswa
            $table->foreign('id_siswa')
                  ->references('id')
                  ->on('siswa')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            // Set FK jurusan_siswa --- jurusan
            $table->foreign('id_jurusan')
                  ->references('id')
                  ->on('jurusan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan_siswa');
    }
}
