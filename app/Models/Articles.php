<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $guarded = ['id'];

    protected static function booted(){
        static::addGlobalScope('userArticle', function($builder){
            if(auth()->check()){
                $builder->where('user_id', auth()->user()->id);
            }
        });
    }
}
