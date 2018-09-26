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
            $table->increments('id');
            $table->timestamps();
            $table->string('kode_piket');
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);


           
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
