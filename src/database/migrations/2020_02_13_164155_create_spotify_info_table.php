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
        Schema::create('spotify_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('debayashi_id')->comment('出囃子ID');
            $table->text('external_url')->nullable()->comment('SpotifyのURL');
            $table->text('image_url')->nullable()->comment('Spotifyのジャケット画像URL');
            $table->text('preview_url')->nullable()->comment('Spotifyのプレビュー再生URL');
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
