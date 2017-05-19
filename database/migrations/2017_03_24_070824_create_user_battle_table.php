<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_battle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('battle_id');
            $table->integer('user_id');
            $table->integer('win_money');
            $table->integer('lose_money');
            $table->integer('draw_money');
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
        Schema::dropIfExists('user_battle');
    }
}
