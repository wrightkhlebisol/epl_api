<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->belongsToMany(
            'App\Team',
            'fixtures',
            'home_team_id',
            'role_id'
        );
    }
}
