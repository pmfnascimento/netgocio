<?php

namespace Database\Seeders;

use App\Models\Round;
use App\Models\Season;
use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = Season::all();
        foreach ($seasons as $item) {
            $this->getRounds($item->id);
        }

    }

    public function getRounds($season)
    {
        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/rounds/season/' . $season . '?api_token=' . env('TOKEN'));
        $rounds = json_decode($jsonString, true);

        $items = $rounds['data'];

        foreach ($items as $item) {

            Round::create([
                'id' => $item['id'],
                'name' => $item['name'],
                'league_id' => $item['league_id'],
                'season_id' => $item['season_id'],
                'stage_id' => $item['stage_id'],
                'start' => $item['start'],
                'end' => $item['end'],
            ]);
        }
    }
}
