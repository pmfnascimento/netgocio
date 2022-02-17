<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $fillable = [
        'player_id',
        'team_id',
        'position_id',
        'common_name',
        'display_name',
        'fullname',
        'firstname',
        'lastname',
        'nationality',
        'birthdate',
        'birthcountry',
        'birthplace',
        'height',
        'weight',
        'image_path',
    ];
}
