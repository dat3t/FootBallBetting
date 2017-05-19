<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hometeam');
            $table->string('guest');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->dateTime('bet_deadline');
            $table->integer('win');
            $table->integer('lose');
            $table->integer('draw');
            $table->integer('hometeam_score');
            $table->integer('guest_score');
            $table->boolean('isPublished');
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
        Schema::dropIfExists('battles');
    }
}
