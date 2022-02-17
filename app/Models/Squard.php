<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squard extends Model
{
    use HasFactory;

    public $fillable = [
                'team_id',
                'player_id',
                'position_id',
                'number',
                'captain',
                'injured',
                'minutes',
                'appearences',
                'lineups',
                'ubstitute_in',
                'ubstitute_out',
                'substitutes_on_bench',
                'goals',
                'owngoals',
                'assists',
                'saves',
                'inside_box_saves',
                'dispossesed',
                'interceptions',
                'yellowcards',
                'yellowred',
                'redcards',
                'tackles',
                'blocks',
                'hit_post',
                'cleansheets',
                'ating',
                'ouls',
                'rosses',
                'ribbles',
                'uels',
                'asses',
                'enalties',
                'hots',
    ];
}
