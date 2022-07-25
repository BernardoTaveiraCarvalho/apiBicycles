<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Country extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
    protected $fillable = ['name'];
    use SoftDeletes;
}
