<?php

namespace App\Modules\Commande\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBackOrder()
    {
       return view('Commande::backOrder');
    }

    public function showInvoiceOrder()
    {
       return view('Commande::invoiceOrder');
    }
}
