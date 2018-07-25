<?php

namespace laradex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model

{
    protected $fillable =['name','avatar','description'];


    public function getRouteKeyName(){

    	return 'slug';
    }
}
