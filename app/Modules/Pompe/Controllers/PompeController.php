<?php

namespace App\Modules\Pompe\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Diffuser\Models\Diffuser;
use App\Modules\Pompe\Models\Pompe;
use App\Modules\Pompe\Models\Etat;
use Datatables;
use Redirect,Response,DB,Config;

class PompeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function showPumps()
   {
       
        //$pumps = Pompe::with('etat')->with('diffuser')->get();s

        //dd($diffusers[150]->company);

        return view('Pompe::pumps');
   }

   public function pumpsList()
   {
      $pumpsQuery = Pompe::query()->with('etat');
      $pumps = $pumpsQuery->select('*');
    //$pumps = Pompe::all();
      return  datatables()->of($pumps)->make(true);
   }
}
