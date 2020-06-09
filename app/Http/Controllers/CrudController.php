<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function getOffers(){
       return  Offer::get();
    }
    public function store(Request $request){
         //  Offer::create(['name' => 'fridge' ,'price' => '2000' ]);
         // validate data before insert to database
        $validator=Validator::make($request->all ,[
            'name' => 'required|max:100|unique:offers,name' ,
            'price' => 'required|numeric',
        ]);
        if ($validator->fails()){
            return validator()->errors();
        }
          //insert
          Offer::create([
                 'name' => $request->name,
                 'price' => $request->price ,
          ]) ;
         return ' saved offer ' ;
    }
    public  function  create(){
        return view('offers.create');
    }
}
