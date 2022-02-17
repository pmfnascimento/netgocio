<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class League extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'active',
        'type',
        'legacy_id',
        'country_id',
        'logo_path',
        'name',
        'is_cup',
        'is_friendly',
        'current_season_id',
        'current_round_id',
        'current_stage_id',
        'live_standings',
        'predictions',
        'topscorer_goals',
        'topscorer_assists',
        'topscorer_cards'
    ];

    public function season()
    {
        $this->hasMany(Season::class);
    }
}
