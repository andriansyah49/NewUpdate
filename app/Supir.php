<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    //
    protected $table="supirs";
    protected $fillable=['id','fotosupir','namasupir','jksupir','no_identitassupir','no_hpsupir','alamatsupir','harga_sewasupir'];
    protected $visible=['id','fotosupir','namasupir','jksupir','no_identitassupir','no_hpsupir','alamatsupir','harga_sewasupir'];

    public function rental()
    {
    	return $this->hasMany('App\rental','supir_id');
    }
}
