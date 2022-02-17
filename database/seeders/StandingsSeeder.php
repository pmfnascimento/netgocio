<?php

namespace Database\Seeders;

use App\Models\Round;
use App\Models\Season;
use App\Models\Standing;
use Illuminate\Database\Seeder;

class StandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = Round::all();
        foreach ($seasons as $item) {
            $this->setStandings($item->season_id, $item->id);
        }
    }

    public function setStandings($season, $round)
    {
        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/standings/season/' . $season . '/round/' . $round . '?api_token=' . env('TOKEN'));
        $standings = json_decode($jsonString, true);

        $items = $standings['data'];


        foreach ($items as $item) {

            Standing::create([
                'round_id' => $round,
                'position' => $item['position'],
                'team_id' => $item['team_id'],
                'team_name' => $item['team_name'],
                'short_code' => $item['short_code'],
                'team_logo' => $item['team_logo'],
                'games_played' => $item['overall']['games_played'],
                'won' => $item['overall']['won'],
                'draw' => $item['overall']['draw'],
                'lost' => $item['overall']['lost'],
                'goals_scored' => $item['overall']['goals_scored'],
                'goal_diff' => $item['overall']['goal_diff'],
                'points' => $item['points'],
                'description' => $item['description'],
                'recent_form' => $item['recent_form'],

            ]);
        }
    }
}
