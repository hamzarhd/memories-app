<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    
    protected $fillable=["id","name","description","souvenir_date","path","user_id"];


    protected $table="souvenir";

    public function User(){

        return $this->belongsTo("App\User","user_id");
    }

}