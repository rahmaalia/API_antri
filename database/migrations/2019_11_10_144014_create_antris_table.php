<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_pasiens_id')->unsigned();
            $table->integer('polis_id')->unsigned();
            $table->string('no_antrian');
            $table->timestamps();

            $table->foreign('data_pasiens_id')->references('id')->on('data_pasiens')->onDelete('cascade');
            $table->foreign('polis_id')->references('id')->on('polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antris');
    }
}
