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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->integer('id')->nullable();
            $table->integer('legacy_id')->nullable();
            $table->integer('season_id')->nullable();
            $table->string('name')->nullable();
            $table->string('short_code')->nullable();
            $table->string('twitter')->nullable();
            $table->integer('country_id')->nullable();
            $table->boolean('national_team')->nullable();
            $table->integer('founded')->nullable();
            $table->string('logo_path')->nullable();
            $table->integer('venue_id')->nullable();
            $table->integer('current_season_id')->nullable();
            $table->boolean('is_placeholder')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
