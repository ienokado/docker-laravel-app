<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('keyword')->comment('ユーザーが検索したキーワード');
            $table->integer('comedian_group_id')->nullable()->comment('芸人ID');
            $table->text('comedian_group_name')->nullable()->comment('検索失敗時のユーザー登録希望のコンビ名');
            $table->integer('debayashi_id')->nullable()->comment('出囃子ID');
            $table->text('debayashi_name')->nullable()->comment('芸人登録がある場合のユーザーが登録希望の出囃子名');
            $table->text('artist_name')->nullable()->comment('芸人登録がある場合のユーザーが登録希望の出囃子のアーティスト名');
            $table->text('User-Agent')->nullable()->comment('検索したユーザーの端末情報');
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
        Schema::dropIfExists('search_histories');
    }
}
