<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspekNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspek_nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('rentang');
            $table->integer('persentase');
            $table->unsignedInteger('bidang_id');
            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('cascade');
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
        Schema::dropIfExists('aspek_nilais');
    }
}
