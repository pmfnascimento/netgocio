<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\LeagueSeeder;
use Database\Seeders\PlayerSeeder;
use Database\Seeders\SeasonSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            LeagueSeeder::class,
            SeasonSeeder::class,
            TeamSeeder::class,
            SquardSeeder::class,
            RoundSeeder::class,
            StandingsSeeder::class,

        ]);

        
    }
}
