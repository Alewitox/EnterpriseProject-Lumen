<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
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
        return response()->json(Customer::all(), 200);
    }
    
    /**
     * Get one user.
     *
     * @return Response
     */
    public function showOneUser($id)
    {
        try {
            $user = Customer::findOrFail($id);

            return response()->json($user, 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    public function showOneUserWithEmail(Request $request)
    {    
        $user=Customer::select('id', 'name', 'email' )->where('email',$request[0]['email']);
        
        return response()->json($user->get('id'));
    }


    public function createUser(Request $request)
    {
        $user = Customer::create($request->all());

        return response()->json($user, 201);
    }

    public function updateUser($id, Request $request)
    {
        $user = Customer::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function deleteUser($id)
    {
        Customer::findOrFail($id)->delete();
        return response('User deleted', 200);
    }

    
}