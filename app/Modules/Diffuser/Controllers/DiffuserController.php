<?php

namespace App\Modules\Diffuser\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Diffuser\Models\Diffuser;
use App\Modules\Diffuser\Models\Anniversaire;
use App\Modules\Company\Models\Company;
use Datatables;
use Redirect,Response,DB,Config;


class DiffuserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showDiffuser()
    {
        return view('Diffuser::diffuser');
    }

    public function diffusersList()
    {   
        $diffusersQuery = Diffuser::query();
        $diffusers = $diffusersQuery->select('*');
        return  datatables()->of($diffusers)->make(true);
    }

    public function showDiffuserHistory($IdDiffuser)
    {
        $diffuser = Diffuser::where('Num_serie', '=', $IdDiffuser)->get();
        return view('Diffuser::diffuser-history', [ 'diffuser' => $diffuser ]);
    }

    public function showAnniversaires()
    {
        return view('Diffuser::anniversaires');
    }

    public function anniversairesList()
    {   
        $anniversaireQuery = Anniversaire::query();
        $anniversaire = $anniversaireQuery->select('*');
        return  datatables()->of($anniversaire)->make(true);
    }
    public function showSav()
    {
        $diffusers = Diffuser::all();
        return view('Diffuser::sav', ['diffusers' => $diffusers]);
    }
}
