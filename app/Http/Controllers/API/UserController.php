<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createUser(UserRequest $request){
        
            // $user  = Auth::user()->role_id;

            $user   = User::create([
                  'nom'       => $request['nom'],
                  'email'     => $request['email'],
                  'tel'       => $request['tel'],
                  'address'   => $request['address'],
                  'role_id'   => $request['role_id'],
                  'company_id'=> $request['company_id'],
              ]);
            return response([
                $user,
                'message'    => 'create a new client of company !',
                ], 200);   
        
    }

    public function listUsers(Request $request){
 
        // $company  = Auth::user()->company_id;
       
            $users = UserResource::collection(User::latest()
                ->orderBy('created_at', 'DESC')
                ->get());
            return response([
                'users' => $users,
                'message'   => 'List Of users !',
                ], 200); 
        
    }
}
