<?php

namespace App\Modules\Product\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function showGammes()
    {
        return view("Product::frontOffice.gammes");
    }
    public function showUnivers()
    {
        return view("Product::frontOffice.univers");
    }

    public function showParfums()
    {
        return view("Product::frontOffice.parfums");
    }
    public function showSynthese()
    {
        return view("Product::frontOffice.synthese");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

}
