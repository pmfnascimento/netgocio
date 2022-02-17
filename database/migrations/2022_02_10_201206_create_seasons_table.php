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
        Schema::create('seasons', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->integer('id')->nullable();
            $table->string('name')->nullable();
            $table->integer('league_id')->nullable();
            $table->boolean('is_current_season')->nullable();
            $table->integer('current_round_id')->nullable();
            $table->integer('current_stage_id')->nullable();
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
        Schema::dropIfExists('seasons');
        
    }
};
