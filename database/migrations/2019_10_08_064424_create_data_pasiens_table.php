<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('polis_id')->unsigned();
            $table->string('no_Identitas');
            $table->string('nama');
            $table->string('kota_lahir');
            $table->string('tgl_lahir');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->timestamps();

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
        Schema::dropIfExists('data_pasiens');
    }
}
