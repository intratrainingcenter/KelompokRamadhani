<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasiswas', function (Blueprint $table) {
            $table->increments('id_dat_siswa');
            $table->timestamps();
            $table->increments('id_siswa');
            $table->string('nama_siswa',40);
            $table->string('Tempat lahir',20);
            $table->string('tgl_lahir',40);
            $table->string('alamat',40);


            




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasiswas');
    }
}
