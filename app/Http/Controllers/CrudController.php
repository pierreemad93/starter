<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    //
    public function getOffers(){
       return  Offer::get();
    }
    public function store(Request $request){
         //  Offer::create(['name' => 'fridge' ,'price' => '2000' ]);
         // validate data before insert to database
        $validator=Validator::make($request->all(),
        $rules = [
            'name' => 'required|max:100|unique:offers,name' ,
            'price' => 'required|numeric',
        ]);
        $message= $this->getMessage();
        $validator=Validator::make($request->all() , $rules ,  $message);
        if ($validator->fails()){

            return $validator->errors();
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
  protected  function getMessage(){
     return $message = [
          'name.required' => 'اسم العرض مطولب' ,
          'price.required'  => 'سعر العرض مطلوب'  ,
          'price.numeric' => 'يجب ان يكون سعر العرض رقم '
      ];
  }
}
