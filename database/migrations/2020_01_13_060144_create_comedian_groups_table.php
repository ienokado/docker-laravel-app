<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComedianGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comedian_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('debayashi_id')->nullable()->comment('出囃子ID');
            $table->string('name')->comment('コンビ名');
            $table->text('description')->nullable()->comment('備考');
            $table->integer('dissolve_flg')->default(0)->comment('解散フラグ');
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
        Schema::dropIfExists('comedian_groups');
    }
}
