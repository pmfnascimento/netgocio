<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->getSeasons(7953);
        $this->getSeasons(12963);
        $this->getSeasons(16222);
    }

    public function getSeasons($id)
    {
        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/seasons/'.$id.'?api_token=' .env('TOKEN'));
        $seasons = json_decode($jsonString, true);

        $item = $seasons['data'];

            Season::create([
                'id' => $item['id'],
                'name' => $item['name'],
                'league_id' => $item['league_id'],
                'is_current_season' => $item['is_current_season'],
                'current_round_id' => $item['current_round_id'],
                'current_stage_id' => $item['current_stage_id']
            ]);
     
    }

}
