<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    //
    protected $table="mobils";
    protected $fillable=['id','fotomobil','plat_no','merk','spesifikasi','harga_sewamobil','status'];
    protected $visible=['id','fotomobil','plat_no','merk','spesifikasi','harga_sewamobil','status'];

    public function rental()
    {
    	return $this->hasMany('App\rental','mobil_id');
    }
}
