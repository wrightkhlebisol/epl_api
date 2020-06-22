<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fixture;

class FixturesController extends Controller
{
    
    /**
     * List all fixtures.
     *
     * @param  Fixture  $fixture
     * @return Response
     */
    
    public function index(Fixture $fixture){
        return response($fixture->all(), 200);

    }

    /**
     * Store a new fixture.
     *
     * @param  Request  $request
     * @param  Fixture  $fixture
     * 
     * @return Response
     */

    public function create(Request $request, Fixture $fixture){

        $this->validate($request, [
            'away_team_id' => 'required|int',
            'home_team_id' => 'required|int',
        ]);

        
        if($request->away_team_id !== $request->home_team_id){
            try{
                $fixture->create($request->all());

                return response()->json(['message' => 'Fixture created successfully', 'fixture' => $fixture], 200);

            }catch(Exception $e){
                return response(['message' => 'Fixture creation failed', 'reason' => $e], 409);
            }
        }else{
            return response()->json(['message' => 'Away Fixture cannot be same as Home Fixture'], 409);
        }

    }

    /**
     * Update a fixture by its id.
     *
     * @param  Request  $request
     * @param  Fixture  $fixture
     * 
     * @return Response
     */

    public function update(Request $request, $id){

        $this->validate($request, [
            'away_team_id' => 'required|int',
            'home_team_id' => 'required|int'
        ]);

        if($request->away_team_id !== $request->home_team_id){
            try{
                $fixture = Fixture::findOrFail($id);

                return $fixture;
    
                $fixture->update(['away_team_id' => $request->away_team_id, 'home_team_id' => $request->home_team_id]);
    
                return response(['message' => 'Fixture update successful', 'fixture' => $fixture], 200);
    
            }catch(Exception $e){
                return response(['message' => 'Fixture update failed', 'reason' => $e], 409);
            }
        }
        
    }

    /**
     * Delete a fixture by its id.
     *
     * @param  Fixture  $fixture
     * @return Response
     */

    public function delete($id){
        try{
            $fixture = Fixture::findOrFail($id);

            $fixture->delete();

            return response(['message' => 'Fixture deleted successful', 'fixture' => $fixture], 200);

        }catch(Exception $e){
            return response(['message' => 'Fixture delete failed', 'reason' => $e->message], 409);
        }
        
    }

}
 