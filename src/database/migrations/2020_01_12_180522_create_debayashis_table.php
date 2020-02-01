<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebayashisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debayashis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('artist_name');
            $table->string('youtube_url')->nullable();
            $table->string('spotify_url')->nullable();
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('debayashis');
    }
}
