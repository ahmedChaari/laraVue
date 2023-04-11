<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function listCompanies(Request $request){

        // $company  = Auth::user()->company_id;

            $companies = CompanyResource::collection(Company::latest()
                ->orderBy('created_at', 'DESC')
                ->get());
            return response([
                'companies' => $companies,
                'message'   => 'List Of companies !',
                ], 200);

    }
    public function updateCompany(Request $request,Company $company){
        $company->update([
            'name'         => $request->name,
            'address'        => $request->address,

            ]);
            return response([
                'company'     => $company,
                'message' => 'update the company !',
                    ], 200);
    }
    public function storeCompany(Request $request){
        $company    = new Company();
        $company->name      = $request->name;
        $company->address   = $request->address;

                   $company->save();

        return response([
        'company' => $company,
        'message'    => 'create a new user !',
            ], 200);

    }

    public function deleteCompany($id){
        Company::findOrFail($id)->delete();
        return response([
            'message'    => 'The company was Deleted',
            ], 200);
    }

}
