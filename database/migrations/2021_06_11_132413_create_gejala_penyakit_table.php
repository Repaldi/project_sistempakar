<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalaPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gejala_id')->unsigned();
            $table->integer('penyakit_id')->unsigned();
            $table->decimal('bobot', 2, 1);
            $table->timestamps();

            $table->foreign('gejala_id')->references('id')->on('gejalas');
            $table->foreign('penyakit_id')->references('id')->on('penyakits');
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
        Schema::dropIfExists('gejala_penyakit');
    }
}
