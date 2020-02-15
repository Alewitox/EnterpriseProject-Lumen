<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

/**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Get all User.
     *
     * @return Response
     */
    public function showAllUsers()
    {
        return response()->json(User::all(), 200);
    }
    
    /**
     * Get one user.
     *
     * @return Response
     */
    public function showOneUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json($user, 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    public function showOneUserWithEmail(Request $request)
    {
        //error_log(json_decode($request)[0]->email);
        
        error_log("hola");
        //error_log(json_decode($request->content(),true));
        $user=User::select('id', 'name', 'email' )->where('email',$request[0]['email']);
        //error_log(response()->json($user->get('id')));
        return response()->json($user->get('id'));
    }


    public function createUser(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return response('User deleted', 200);
    }

    
}