<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class back extends Model
{
    protected $table="backs";
    protected $fillable=['id','no_identitaskons','namakons','total_harga','no_hpkons','jkkons','alamatkons','tgl_sewa','tgl_kembali','jumlah_hari','total_sewa','namasupir','harga_supir','merk_mobil','harga_mobil','telat','denda'];
    protected $visible=['id','no_identitaskons','namakons','no_hpkons','total_harga','jkkons','alamatkons','tgl_sewa','tgl_kembali','jumlah_hari','total_sewa','mobil_id','supir_id','harga_supir','merk_mobil','harga_mobil','telat','denda'];
}
