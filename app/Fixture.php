<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Fixture extends Model
{
    protected $guarded = [];

    public function getHomeTeamIdAttribute($value)
    {
        return Team::where('id', $value)->get('team_name')[0]['team_name'];
    }

    public function getAwayTeamIdAttribute($value)
    {
        return Team::where('id', $value)->get('team_name')[0]['team_name'];
    }

    // protected $appends = ['away_team_id', 'home_team_id'];

    public function team()
    {
        return $this->belongsToMany(
            'App\Team',
            'fixtures',
            'home_team_id',
            'away_team_id'
        );
    }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d');
    // }
}
