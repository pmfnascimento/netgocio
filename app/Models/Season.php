<?php

namespace App\Models;


use App\Models\League;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Season extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'name',
        'league_id',
        'is_current_season',
        'current_round_id',
        'current_stage_id',
    ];

    public function league()
    {
        $this->belongsToMany(League::class);
    }
}
