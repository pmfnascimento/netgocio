<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->setLeague(501);
        $this->setLeague(271);
    }

    public function setLeague($league)
    {
        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/leagues/'.$league.'?api_token=' . env('TOKEN'));
        $leagues = json_decode($jsonString, true);

        $item = $leagues['data'];



        League::create([
            'id' => $item['id'],
            'active' => $item['active'],
            'type' => $item['type'],
            'legacy_id' => $item['legacy_id'],
            'country_id' => $item['country_id'],
            'logo_path' => $item['logo_path'],
            'name' => $item['name'],
            'is_cup' => $item['is_cup'],
            'is_friendly' => $item['is_friendly'],
            'current_season_id' => $item['current_season_id'],
            'current_round_id' => $item['current_round_id'],
            'current_stage_id' => $item['current_stage_id'],
            'live_standings' => $item['live_standings'],
            'coverage' => json_encode($item['coverage']),
        ]);
       
    }

}
