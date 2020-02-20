<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotifyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spotify_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('debayashi_id')->nullable()->comment('出囃子ID');
            $table->text('spotify_url')->nullable()->comment('SpotifyのURL');
            $table->text('spotify_image_url')->nullable()->comment('Spotifyのジャケット画像URL');
            $table->text('spotify_preview_url')->nullable()->comment('Spotifyのプレビュー再生URL');
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
        Schema::dropIfExists('spotify_info');
    }
}
