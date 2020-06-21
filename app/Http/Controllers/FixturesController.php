<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FixturesController extends Controller
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

    public function create(Request $request, User $user){

        return $user->all();
    }

    public function update(Request $request, User $user){

        return $user->all();
    }

    public function delete(Request $request, User $user){

        return $user->all();
    }
}
 