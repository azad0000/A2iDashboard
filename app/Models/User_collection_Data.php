<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_collection_Data extends Model
{
    use HasFactory;
    protected $guard = [];

    public function division_name(){
       return $this->hasOne(division::class,'bbs_code','division');
    }
    public function district_name(){
        return $this->hasOne(district::class,'bbs_code','district');
    }
    public function sub_district_name(){
        return $this->hasOne(sub_district::class,'bbs_code','sub_district');
    }
}
