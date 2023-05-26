<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    use HasFactory;
    protected $fillable = ["idUser","type_pet","species_pet","name_pet","age_pet","gender_pet","img_pet","moreinfo_pet"	];

    public function user(){
        return $this ->belongsTo(user::class,'idUser','id');
    }
}
