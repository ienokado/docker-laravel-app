<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSearchHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dropColumn('comedian_group_name');
            $table->dropColumn('debayashi_name');
            $table->dropColumn('artist_name');
            $table->dropColumn('User-Agent');
            $table->text('user_agent')->nullable()->comment('検索したユーザーの端末情報')->after('debayashi_id');
            $table->text('ip_address')->nullable()->comment('検索したユーザーのip')->after('user_agent');
            $table->dateTime('searched_at')->nullable()->comment('ユーザーが検索した日時')->after('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->text('comedian_group_name')->nullable()->comment('検索失敗時のユーザー登録希望のコンビ名')->after('comedian_group_id');
            $table->text('debayashi_name')->nullable()->comment('芸人登録がある場合のユーザーが登録希望の出囃子名')->after('debayashi_id');
            $table->text('artist_name')->nullable()->comment('芸人登録がある場合のユーザーが登録希望の出囃子のアーティスト名')->after('artist_name');
            $table->dropColumn('user_agent');
            $table->dropColumn('ip_address');
            $table->dropColumn('searched_at');
        });
    }
}
