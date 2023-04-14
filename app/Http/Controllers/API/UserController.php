<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\History;
use App\Models\User;
use App\Notifications\CreateCompteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function listUsers(Request $request){

        $query        = $request->get('search');
        $queryCompany = $request->get('searchCompany');
        $filterType   = $request->get('name') == 'DESC' ? 'DESC' : 'ASC';

         $company  = Auth::user()->company_id;

            if (Auth::user()->role_id == 1) {
                $users = UserResource::collection(User::latest()
                ->where( function($mquery) use ($query) {
                    $mquery->where('name', 'LIKE', "%{$query}%");
                })
                ->whereHas('company', function($query) use($queryCompany) {
                $query -> where('name', 'LIKE', '%'. $queryCompany .'%');
                })
                ->orderBy('name', $filterType)
                ->get());
            }elseif(Auth::user()->role_id == 2){
                $users = UserResource::collection(User::latest()
                ->where('company_id', $company  )
                ->orderBy('created_at', 'DESC')
                ->get());
            }

                 return response([
                    'users'     => $users,
                    'message' => 'list the users !',
                        ], 200);
    }
    public function updateUser(UpdateUserRequest $request,User $user){

        $user->update([
            'address'      => $request->address,
            'tel'          => $request->tel,
            'age'          => $request->age,
            'company_id'      => $request->company_id,
            'role_id'          => $request->role_id,
            'name'          => $request->name,

            ]);
            return response([
                'user'     => $user,
                'message' => 'update the user !',
                    ], 200);
    }
    public function confirmWithUser(UpdateUserRequest $request,User $user){

        $user->update([
            'address'      => $request->address,
            'tel'          => $request->tel,
            'age'          => $request->age,
            'password'     => bcrypt($request['password']),
            'valid'        => 1,
            'status'       => 1,
            ]);

            $name = 'valider l’invitation';
            History::create([
                'name'        => $name,
                'user_name'  =>   Auth::user()->name,
                'user_id'     =>  Auth::user()->id,
            ]);
            return response([
                'user'     => $user,
                'message' => 'update the user !',
                    ], 200);
    }

    public function storeUser(CreateUserRequest $request){

        $userId =  Auth::user()->id;
        $userCompte = User::where('id' ,$userId)
                    ->where('number_invite' , 0)->first();

        if (Auth::user()->role_id == 1) {
        # code...
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

            //CreateCompteNotification
            $url = env('APP_URL').'/email-change-password';
            Notification::route('mail', $user->email)->notify(new CreateCompteNotification($url));
            }elseif(Auth::user()->role_id == 2 &&  $userCompte){
                    # code...
                    $user    = new User();
                    $user->name          = $request->name;
                    $user->address       = $request->address;
                    $user->email         = $request->email;
                    $user->tel           = $request->tel;
                    $user->role_id       = $request->role_id;
                    $user->status        = 0;
                    $user->number_invite = 1;
                    $user->company_id    = $request->company_id;

                            $user->save();

                    //CreateCompteNotification

                    $token = $user->createToken('myapptoken')->plainTextToken;

                    $url = env('APP_URL').'/email-change-password?token=' . $token;
                    Notification::route('mail', $user->email)->notify(new CreateCompteNotification($url));
            }else{
                return response([
                    'message'    => 'you do not have any permission for this !',
                        ], 400);
            }
            $name = 'invite l’employé ';
            History::create([
                'name'        => $name,
                'user_name'  =>   Auth::user()->name,
                'user_id'     =>  Auth::user()->id,
            ]);


        return response([
        'user' => $user,
        'message'    => 'create a new user !',
            ], 200);

    }
    public function deleteUser($id){


        if (Auth::user()->role_id == 1) {
            User::findOrFail($id)->delete();

            $name = 'delete l’employé ';
            $history =  History::create([
                'name'        => $name,
                'user_name'  =>   Auth::user()->name,
                'user_id'     =>  Auth::user()->id,
            ]);
        }
        else{
            return response([
                'message'    => 'you do not have any permission for this !',
                    ], 400);
        }

        return response([
            $history,
            'message'    => 'The user was Deleted',
            ], 200);
    }

    public function cancelValidUser($id){

       $user = User::where('id',$id)
            ->where('status', 0)
            ->first();

            if (!$user) {
                return response([
                    'message'    => 'you do not have any permission for this !',
                        ], 400);
            }else{
                $user->update([
                 'valid'         => 0,
                 ]);
            }

        $name = 'annulée l’invitation';
        $history =  History::create([
            'name'        => $name,
            'user_name'  =>   Auth::user()->name,
            'user_id'     =>  Auth::user()->id,
        ]);
        return response([
            'user' => $user,
            'history' => $history,
            'message'    => 'The user was Deleted',
            ], 200);
    }
}
