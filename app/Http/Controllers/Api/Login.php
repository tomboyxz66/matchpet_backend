<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use App\Models\pet;

class Login extends Controller
{
    function login(Request $request){
        $data = $request->validate([
            'user_name'=>'required',
            'password'=>'required'
        ]);

        $user = user::where('user_name',$data['user_name'])->first();
        if(!$user){
            return response([
                'message'=>'Invalid username or password',
            ],401);
        }
        else if (Hash::check($data['password'],$user['password'])){
            $user['password']="-";
            return response([
                'user'=>$user,
            ],200);

        }
    }

    function register(Request $request){



        $data = $request->validate([
            "user_data" => 'required',
            "pet_data" => 'required'
        ]);

        $user_data =  json_decode($request->user_data,true);
        $user_data['user_data']['password'] = bcrypt($user_data['user_data']['password']);
        $user_id = user::create([
            'first_name'=>$user_data['user_data']['first_name'],
                'last_name'=>$user_data['user_data']['last_name'],
                'email'=>$user_data['user_data']['email'],
                'user_name'=>$user_data['user_data']['user_name'],
                'password'=>$user_data['user_data']['password'],
                'tel'=>$user_data['user_data']['tel'],
        ])->id;
        $json_pet_data = json_decode($request->pet_data,true);

        foreach($json_pet_data['pet_data'] as $key=>$val){
            pet::create([
                "idUser" => $user_id,
                "type_pet" => $val['type_pet'],
                "species_pet" => $val['species_pet'],
                "name_pet" => $val['name_pet'],
                'age_pet'=> $val['age_pet'],
                'gender_pet'=>$val['gender_pet'],
                'moreinfo_pet'=>$val['more_info_pet'],
                'img_pet' => $request->file($key==0?'img_pet':'img_pet2')->store('pet_img', 'public')
            ]);
        }

        return response([
            'message' => 'success',
        ],200);

    }


}
