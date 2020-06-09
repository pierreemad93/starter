<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function getOffers(){
       return  Offer::get();
    }
}
