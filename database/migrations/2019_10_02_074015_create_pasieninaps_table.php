<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasieninapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasieninaps', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('kamar_id')->unsigned();
            $table->string('nama_pasien');
            $table->string('nama_wali');
            $table->string('jenis_kelamin');
            $table->integer('no_telp');
            $table->string('umur');
            $table->string('gl_darah');
            $table->text('alamat');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->timestamps();

            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasieninaps');
    }
}
