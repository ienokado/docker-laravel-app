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
            $table->string('name')->comment('出囃子名');
            $table->text('artist_name')->comment('アーティスト名');
            $table->integer('active')->default(1)->comment('0: 非アクティブ, 1: アクティブ');
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
