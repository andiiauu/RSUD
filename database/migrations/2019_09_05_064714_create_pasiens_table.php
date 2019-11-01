<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('pasiens', function (Blueprint $table) {
          $table->Increments('id');
          $table->integer('dokter_id')->unsigned();
          $table->integer('kamar_id');
          $table->string('nama_pasien');
          $table->string('nama_wali');
          $table->string('jenis_kelamin');
          $table->integer('no_telp');
          $table->string('umur');
          $table->string('gl_darah');
          $table->text('alamat');
          $table->timestamp('tgl_masuk');

          $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
