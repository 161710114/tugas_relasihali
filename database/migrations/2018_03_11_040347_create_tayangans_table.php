<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTayangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tayangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_film');
            $table->string('waktu');
            $table->unsignedInteger('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tayangans');
    }
}
