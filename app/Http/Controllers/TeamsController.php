<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;

class TeamsController extends Controller
{

    /**
     * Instantiate a new Auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List all teams.
     *
     * @param  Team  $team
     * @return Response
     */
    
    public function index(Team $team){
        return $team->latest()->get();

    }

    /**
     * Store a new team.
     *
     * @param  Request  $request
     * @param  Team  $team
     * 
     * @return Response
     */

    public function create(Request $request, Team $team){

        $this->validate($request, [
            'team_name' => 'required|string|unique:teams'
        ]);

        
        try{
            $team->create($request->all());

            return response()->json(['message' => 'Team created successfully', 'team' => $team], 200);

        }catch(Exception $e){
            return response(['message' => 'Team creation failed', 'reason' => $e], 409);
        }

    }

    /**
     * Update a team by its id.
     *
     * @param  Request  $request
     * @param  Team  $team
     * 
     * @return Response
     */

    public function update(Request $request, $id){

        $this->validate($request, [
            'team_name' => 'required|string|unique:teams'
        ]);

        try{
            $team = Team::findOrFail($id);

            $team->update(['team_name' => $request->team_name]);

            return response(['message' => 'Team update successful', 'team' => $team], 200);

        }catch(Exception $e){
            return response(['message' => 'Team update failed', 'reason' => $e], 409);
        }
        
    }

    /**
     * Delete a team by its id.
     *
     * @param  Team  $team
     * @return Response
     */

    public function delete($id){
        try{
            $team = Team::findOrFail($id);

            if($team){
                $team->delete();
    
                return response(['message' => 'Team deleted successful', 'team' => $team], 200);

            }else{
                return response(['message' => 'Team does not exist'], 404);
            }

        }catch(Exception $e){
            return response(['message' => 'Team delete failed', 'reason' => $e->message], 409);
        }
        
    }
}
