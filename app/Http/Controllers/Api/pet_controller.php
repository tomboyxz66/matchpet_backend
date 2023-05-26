<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pet;
use App\Models\user;


class pet_controller extends Controller
{


   function get_pet_by_user(Request $request){
    $data = $request -> validate([
        'id_user'=>'required',
    ]);

    $pet=pet::where('idUser',$data['id_user'])->get();
    return response([
        'pet'=>$pet,
    ],200);

   }

}
