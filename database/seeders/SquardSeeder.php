<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;

use App\Models\Squard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SquardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::groupBy('id')->get();

         foreach ($teams as $team) {
            
            $this->getSquard($team->id, $team->season_id);
          
         }

        
    }

    public function getSquard($team, $season)
    {
        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/squad/season/'. $season.'/team/'.$team.'?api_token='.env('TOKEN').'&include=player');

        $squad = json_decode($jsonString, true);

        $items = $squad['data'];

        foreach ($items as $item) {

            DB::table('squards')->insert([
                'team_id' => $team,
                'player_id' => $item['player_id'],
                'position_id' => $item['position_id'],
                'number' => $item['number'],
                'captain' => $item['captain'],
                'injured' => $item['injured'],
                'minutes' => $item['minutes'],
                'appearences' => $item['appearences'],
                'lineups' => $item['lineups'],
                'substitute_in' => $item['substitute_in'],
                'substitute_out' => $item['substitute_out'],
                'substitutes_on_bench' => $item['substitutes_on_bench'],
                'goals' => $item['goals'],
                'owngoals' => $item['owngoals'],
                'assists' => $item['assists'],
                'saves' => $item['saves'],
                'inside_box_saves' => $item['inside_box_saves'],
                'dispossesed' => $item['dispossesed'],
                'interceptions' => $item['interceptions'],
                'yellowcards' => $item['yellowcards'],
                'yellowred' => $item['yellowred'],
                'redcards' => $item['redcards'],
                'tackles' => $item['tackles'],
                'blocks' => $item['blocks'],
                'hit_post' => $item['hit_post'],
                'cleansheets' => $item['cleansheets'],
                'rating' => $item['rating'],
                'fouls' => json_encode($item['fouls']),
                'crosses' => json_encode($item['crosses']),
                'dribbles' => json_encode($item['dribbles']),
                'duels' => json_encode($item['duels']),
                'passes' => json_encode($item['passes']),
                'penalties' => json_encode($item['penalties']),
                'shots' => json_encode($item['shots']),
            ]);

            Player::create([
                'player_id' => $item['player']['data']['player_id'],
                'team_id' => $team,
                'country_id' => $item['player']['data']['country_id'],
                'position_id' => $item['player']['data']['position_id'],
                'common_name' => $item['player']['data']['common_name'],
                'display_name' => $item['player']['data']['display_name'],
                'fullname' => $item['player']['data']['fullname'],
                'firstname' => $item['player']['data']['firstname'],
                'lastname' => $item['player']['data']['lastname'],
                'nationality' => $item['player']['data']['nationality'],
                'birthdate' => $item['player']['data']['birthdate'],
                'birthcountry' => $item['player']['data']['birthcountry'],
                'birthplace' => $item['player']['data']['birthplace'],
                'height' => $item['player']['data']['height'],
                'weight' => $item['player']['data']['weight'],
                'image_path' => $item['player']['data']['image_path']
            ]);
       
        }

    }
}
