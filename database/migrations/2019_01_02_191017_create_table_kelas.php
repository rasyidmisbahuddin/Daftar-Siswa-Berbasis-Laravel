<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_semester', 20);
            $table->timestamps();
        });

        // Set FK di kolom is_semester di tabel siswa.
        Schema::table('siswa', function (Blueprint $table) {
            $table->foreign('id_semester')
                  ->references('id')
                  ->on('semester')
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
        // Drop FK di kolom id_semester di tabel siswa
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign('siswa_id_semester_foreign');
        });

        Schema::dropIfExists('semester');
    }
}
