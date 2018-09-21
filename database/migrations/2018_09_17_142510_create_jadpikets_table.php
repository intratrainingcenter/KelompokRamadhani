<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadpiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadpikets', function (Blueprint $table) {
            $table->increments('id_jadpiket');
            $table->timestamps();
            $table->integer('id_siswa');
            $table->string('nama_siswa',40);
            $table->string('hari');


           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadpikets');
    }
}
