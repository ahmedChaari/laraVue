<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
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
                'message' => 'update the section !',
                    ], 200);
    }

}
