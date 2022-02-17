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
        Schema::create('leagues', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->integer('id')->nullable();
            $table->boolean('active')->nullable();
            $table->string('type')->nullable();;
            $table->string('legacy_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_cup')->nullable();
            $table->boolean('is_friendly')->nullable();
            $table->integer('current_season_id')->nullable();
            $table->integer('current_round_id')->nullable();
            $table->integer('current_stage_id')->nullable();
            $table->boolean('live_standings')->nullable();
            $table->boolean('coverage')->nullable();
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
        Schema::dropIfExists('leagues');
    }
};
