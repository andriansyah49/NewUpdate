<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    //
    protected $table="rentals";
    protected $fillable=['id','no_identitaskons','namakons','no_hpkons','jkkons','alamatkons','tgl_sewa','tgl_kembali','jumlah_hari','merk_mobil','total_sewa','mobil_id','supir_id'];
    protected $visible=['id','no_identitaskons','namakons','no_hpkons','jkkons','alamatkons','tgl_sewa','tgl_kembali','jumlah_hari','total_sewa','merk_mobil','mobil_id','supir_id'];

    public function supir()
	{
		return $this->belongsTo('App\Supir');
	}


    public function mobil()
	{
		return $this->belongsTo('App\Mobil');
	}
}
