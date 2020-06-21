<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function register(Request $request, User $user){

        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
           
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $request_password = $request->input('password');
            $user->password = app('hash')->make($request_password);
            $user->is_admin = false;

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function login(Request $request, User $user){

        return $user->all();
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function logout(Request $request, User $user){

        return $user->all();
    }
}
