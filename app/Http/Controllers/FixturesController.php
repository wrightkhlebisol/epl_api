<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fixture;

class FixturesController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function index(Request $request, Fixture $fixture){

        return $fixture->all();
    }

    public function create(Request $request, Fixture $fixture){

        return $fixture->all();
    }

    public function update(Request $request, Fixture $fixture){

        return $fixture->all();
    }

    public function delete(Request $request, Fixture $fixture){

        return $fixture->all();
    }
}
 