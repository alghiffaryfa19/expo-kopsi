<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->json('item');
            $table->json('kalkulasi_item');
            $table->double('nilai_total');
            $table->unsignedInteger('karya_id');
            $table->foreign('karya_id')->references('id')->on('karyas')->onDelete('cascade');
            $table->unsignedInteger('juri_id');
            $table->foreign('juri_id')->references('id')->on('juris')->onDelete('cascade');
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
        Schema::dropIfExists('nilais');
    }
}
