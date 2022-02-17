<?php

namespace Database\Seeders;


use App\Models\Team;
use App\Models\Season;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasonData = Season::all(); 
        foreach ($seasonData as $data) {

          $this->getTeam($data->id);
        }
    }


        public function getTeam($id){

        $jsonString = file_get_contents('https://soccer.sportmonks.com/api/v2.0/teams/season/' . $id . '?api_token=' . env('TOKEN'));
        $teams = json_decode($jsonString, true);

        $items = $teams['data'];

        foreach($items as $item){


            Team::create([
                'id' => $item['id'],
                'season_id' => $id,
                'name' => $item['name'],
                'legacy_id' => $item['legacy_id'],
                'short_code' => $item['short_code'],
                'twitter' => $item['twitter'],
                'country_id' => $item['country_id'],
                'national_team' => $item['national_team'],
                'founded' => $item['founded'],
                'logo_path' => $item['logo_path'],
                'venue_id' => $item['venue_id'],
                'current_season_id' => $item['current_season_id'],
                'is_placeholder' => $item['is_placeholder']

            ]);
        }
    }
}
