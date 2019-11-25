<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntriMatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antri_matas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_pasien_matas_id')->unsigned();
            $table->integer('polis_id')->unsigned();
            $table->string('no_antrian');
            $table->string('status');
            $table->timestamps();

            $table->foreign('data_pasien_matas_id')->references('id')->on('data_pasien_matas')->onDelete('cascade');
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
        Schema::dropIfExists('antri_matas');
    }
}
