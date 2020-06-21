<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function index(Request $request, Team $team){

        return $team->all();
    }

    public function create(Team $team){

        return $team->all();

    }

    public function update(Team $team){

        return $team->all();
        
    }

    public function delete(Team $team){

        return $team->all();
        
    }
}
