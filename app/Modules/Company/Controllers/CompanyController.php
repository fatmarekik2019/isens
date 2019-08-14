<?php

namespace App\Modules\Company\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Company\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddCompany()
    {
        $company = Company::all();
        return view('Company::newCompany' , ['company'=> $company]);
    }
    public function showCompanies()
    {
        $company = Company::all();
        return view('Company::resumeCompanies' , ['company'=> $company]);
    }
}
