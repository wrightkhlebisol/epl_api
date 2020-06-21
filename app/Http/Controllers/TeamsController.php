<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TeamsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function index(Request $request, User $user){

        return $user->all();
    }

    public function create(){

    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
