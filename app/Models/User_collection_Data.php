<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_collection_Data extends Model
{
    use HasFactory;
    protected $guard = [];

    public function divisions(){
       return $this->hasMany(division::class,'bbs_code','division');
    }
    public function districts(){
        return $this->hasMany(district::class,'bbs_code','district');
    }
    public function sub_districts(){
        return $this->hasMany(sub_district::class,'bbs_code','sub_district');
    }
}
