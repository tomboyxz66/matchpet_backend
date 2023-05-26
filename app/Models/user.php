<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = ["first_name","last_name","user_name","password","tel","email"	];

    public function pet(){
        return $this ->hasMany(pet::class,'idUser','id');
    }
}
