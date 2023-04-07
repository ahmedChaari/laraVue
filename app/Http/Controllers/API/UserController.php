<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createUser(Request $request){
        
            $user  = Auth::user()->role_id;
    
    if ($user == 1) {        
          $user       = User::create([
                  'nom'        => $request['nom'],
                  'email'      => $request['email'],
                  'gender'     => $request['gender'],
                 
              ]);
  
    }
              //  $comp = $request->tags;
                //if (empty($comp)){}else{                        
                    
                $companyArray = explode("," ,$request->companies);
                $user->companies()->attach($companyArray);
          
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
