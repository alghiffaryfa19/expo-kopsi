<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profils')->onDelete('cascade');
            $table->string('nama_karya');
            $table->text('deskripsi');
            $table->string('video');
            $table->text('poster');
            $table->text('banner')->nullable();
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
        Schema::dropIfExists('karyas');
    }
}
