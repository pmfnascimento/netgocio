<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->integer('round_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('team_id')->nullable();
            $table->string('team_name')->nullable();
            $table->string('short_code')->nullable();
            $table->string('team_logo')->nullable();
            $table->integer('games_played')->nullable();
            $table->integer('won')->nullable();
            $table->integer('draw')->nullable();
            $table->integer('lost')->nullable();
            $table->integer('goals_scored')->nullable();
            $table->integer('goal_diff')->nullable();
            $table->integer('points')->nullable();
            $table->string('description')->nullable();
            $table->string('recent_form')->nullable();
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
        Schema::dropIfExists('standings');
    }
};
