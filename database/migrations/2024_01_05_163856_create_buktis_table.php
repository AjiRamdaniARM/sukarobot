<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buktis', function (Blueprint $table) {
            $table->id();
            $table->string('q1');
            $table->string('q2');
            $table->string('foto');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pelatihan');
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
        Schema::dropIfExists('buktis');
    }
}
