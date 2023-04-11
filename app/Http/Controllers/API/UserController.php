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
    public function updateUser(Request $request,User $user){
        $user->update([
            'name'         => $request->name,
            'address'      => $request->address,
            'email'        => $request->email,
            'tel'          => $request->tel,
            'role_id'      => $request->role_id,
            'company_id'   => $request->company_id,
            ]);


            return response([
                'user'     => $user,
                'message' => 'update the user !',
                    ], 200);
    }

    public function storeUser(Request $request){

        $user    = new User();
            $user->name       = $request->name;
            $user->address    = $request->address;
            $user->email      = $request->email;
            $user->tel        = $request->tel;
            $user->role_id    = $request->role_id;
            $user->status     = 0;
            $user->valid      = 0;
            $user->company_id = $request->company_id;

                   $user->save();

        return response([
        'company' => $user,
        'message'    => 'create a new user !',
            ], 200);

    }
    public function deleteUser($id){
        User::findOrFail($id)->delete();
        return response([
            'message'    => 'The company was Deleted',
            ], 200);
    }
}
