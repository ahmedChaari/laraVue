<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     public function listRoles(Request $request){
 
        // $company  = Auth::user()->company_id;
       
            $roles = RoleResource::collection(Role::latest()
                ->get());
            return response([
                'roles' => $roles,
                'message'    => 'List Of Roles !',
                ], 200); 
        
    }
}
