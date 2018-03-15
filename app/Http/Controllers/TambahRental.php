<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rental;
use App\Supir;
use App\Mobil;
use App\back;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;
use Carbon\Carbon;

class TambahRental extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'no_identitaskons'=> 'required|unique:rentals,no_identitaskons',
            'no_hpkons'=> 'required|unique:rentals,no_hpkons'
            ]);
        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menyimpan Data Rental"]);

        $mobil = Mobil::findOrFail($id);
        $mobil->status = "Disewa";
        $mobil->save();

        $transaksi = $request->all();

        $mobil = Mobil::where('id', $transaksi['mobil_id'])->first();
        // dd($mobil);
        $hargasewa = $mobil->harga_sewamobil;
        // dd($hargasewa);
        $supir = Supir::where('id', $transaksi['supir_id'])->first();

        $rental = new rental;
        $rental->no_identitaskons=$request->no_identitaskons;
        $rental->namakons =$request->nama;
        $rental->jkkons=$request->jk;
        $rental->alamatkons=$request->alamat;
        $rental->no_hpkons=$request->no_hpkons;
        $rental->status="Belum";
        
        $rental->tgl_sewa=$request->tgl_sewa;
        $rental->tgl_kembali=$request->tgl_kembali;

        $awal = new Carbon($request->tgl_sewa);
        $akhir = new Carbon($request->tgl_kembali);
        $hasil= "{$awal->diffInDays($akhir)}";
        $rental->jumlah_hari=$hasil;
        $rental->mobil_id=$request->mobil_id;
        $rental->supir_id=$request->supir_id;
        $rental->total_sewa=($hargasewa + $supir->harga_sewasupir) * $hasil;

        if ($rental->supir->i=="ya") {
            $supir->status="Disewa";
            $supir->save();
        }

        $rental->save();
        return redirect('rental');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
