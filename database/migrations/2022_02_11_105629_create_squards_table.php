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
        Schema::create('squards', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->integer('team_id')->nullable();
            $table->integer('player_id')->nullable();
            $table->integer('position_id')->nullable();
            $table->integer('number')->nullable();
            $table->integer('captain')->nullable();
            $table->boolean('injured')->nullable();
            $table->integer('minutes')->nullable();
            $table->integer('appearences')->nullable();
            $table->integer('lineups')->nullable();
            $table->string('substitute_in')->nullable();
            $table->string('substitute_out')->nullable();
            $table->integer('substitutes_on_bench')->nullable();
            $table->integer('goals')->nullable();
            $table->integer('owngoals')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('saves')->nullable();
            $table->integer('inside_box_saves')->nullable();
            $table->integer('dispossesed')->nullable();
            $table->integer('interceptions')->nullable();
            $table->integer('yellowcards')->nullable();
            $table->integer('yellowred')->nullable();
            $table->integer('redcards')->nullable();
            $table->integer('tackles')->nullable();
            $table->integer('blocks')->nullable();
            $table->integer('hit_post')->nullable();
            $table->integer('cleansheets')->nullable();
            $table->string('rating')->nullable();
            $table->string('fouls')->nullable();
            $table->string('crosses')->nullable();
            $table->string('dribbles')->nullable();
            $table->string('duels')->nullable();
            $table->string('passes')->nullable();
            $table->string('penalties')->nullable();
            $table->string('shots')->nullable();
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
        Schema::dropIfExists('squards');
    }
};
