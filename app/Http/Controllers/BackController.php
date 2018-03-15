<?php

namespace App\Http\Controllers;
use App\back;
use App\Rental;
use App\Mobil;
use App\Supir;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $back= back::all();
        return view('back.index', compact('back'));
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
     * @param  \App\back  $back
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $back= back::findOrFail($id);
        return view('back.detail', compact('back'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\back  $back
     * @return \Illuminate\Http\Response
     */
    public function edit(back $back)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\back  $back
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rental = rental::findOrFail($request->id);
        $rental->status = "Sudah";
        $rental->save();
        
        $mobil = Mobil::findOrFail($request->id_mobil);
        $mobil->status = "Tidak";
        $mobil->save();

        $mobil = Supir::findOrFail($request->id_supir);
        $mobil->status = "Tidak";
        $mobil->save();
        
        $bebas = $request->all();

        $rental = new back;
        $rental->no_identitaskons =$request->no_identitaskons;
        $rental->namakons =$request->namakons;
        $rental->alamatkons =$request->alamatkons;
        $rental->no_hpkons =$request->no_hpkons;
        $rental->jkkons =$request->jkkons;
        $rental->merk_mobil =$request->merk;
        $rental->plat_no =$request->plat_no;
        $rental->harga_mobil=$request->harga_mobil;
        $rental->nama_supir =$request->nama_supir;
        $rental->harga_supir= $request->harga_supir;
        $rental->tgl_sewa= $request->tgl_sewa;
        $rental->tgl_kembali_awal= $request->tgl_kembali_awal;
        $rental->tgl_kembali_akhir= $request->tgl_kembali_akhir;

        $awal = new Carbon($request->tgl_sewa);
        $akhir = new Carbon($request->tgl_kembali_akhir);
        $hasil= "{$awal->diffInDays($akhir)}";

        $rental->jumlah_hari= $hasil;
        $rental->telat= ($hasil - $request->jumlah_hari_awal);
        $rental->denda= ($hasil * ($request->harga_mobil + $request->harga_supir))- $request->total_sewa_awal;
        $rental->total_harga= $hasil * ($request->harga_mobil + $request->harga_supir);
        //dd($rental);
        $rental->save();
        return redirect('back');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\back  $back
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $back = back::findOrFail($id);
        $back->delete();
        return redirect('back');
    }
}
