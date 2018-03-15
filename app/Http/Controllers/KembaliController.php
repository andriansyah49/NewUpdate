<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kembali;
use App\Sewa;
use App\Mobil;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kembali=Kembali::with('sewa')->get();
        return view('kembali.index',compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kembali=Sewa::all();
        return view('kembali.create',compact('kembali'));
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
        $bebas = $request->all();


        $sewa = Sewa::where('id', $bebas['id_sewa'])->first();
        // dd($sewa);
        $mobil = Mobil::where('id', $sewa->mobil_id)->first();
        // dd($mobil);

        $kembali = new Kembali;
        $kembali->tgl_kembali=$request->tgl_kembali;
        $kembali->jum_hari =$request->jum_hari;
        $kembali->sewa_id= $request->id_sewa;
        $kembali->telat= ($request->jum_hari - $sewa->jum_hari);
        $kembali->denda= ($request->jum_hari - $sewa->jum_hari) * $mobil->harga_sewa;
        $kembali->total_harga= $sewa->total_sewa +(($request->jum_hari - $sewa->jum_hari) * $mobil->harga_sewa);
        // dd($kembali);
        $kembali->save();
        return redirect('kembali');



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
        $sewa=Sewa::all();
        $kembali = Kembali::findOrFail($id);
        return view('kembali.detail',compact('kembali','sewa'));
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
        $sewa=Sewa::all();
        $kembali = Kembali::findOrFail($id);
        return view('kembali.edit',compact('kembali','sewa'));
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
