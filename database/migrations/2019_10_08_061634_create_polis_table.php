<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dokters_id')->unsigned();
            $table->string('nama_poli');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->timestamps();

            // $table->foreign('dokters_id')->references('id')->on('dokters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polis');
    }
}
