<?php

namespace App\Modules\Anniversaire\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Anniversaire\Models\Anniversaire;

class AnniversaireController extends Controller
{
    public function showAnniversaires()
    {
        $anniversaires = Anniversaire::with('company')->get();
        return view("Anniversaire::anniversaires",['anniversaires'=>$anniversaires]);
    }
}
