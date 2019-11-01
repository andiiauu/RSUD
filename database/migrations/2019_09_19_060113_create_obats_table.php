<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('kategoriobat_id')->unsigned();
            $table->string('nama_obat');
            $table->integer('harga_obat');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('kategoriobat_id')->references('id')->on('kategoriobats')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
