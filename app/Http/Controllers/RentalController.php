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
class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supir=Supir::all();
        $mobil=Mobil::all();
        $rental=rental::where('status','Belum')->get();
        return view('rental.index',compact('rental','supir','mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rental.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        return view('rental.edit', compact('mobil','rental'));
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
        $mobil = Mobil::all();
        $supir = Supir::all();
        $rental = rental::findOrFail($id);
        return view('rental.detail', compact('mobil','supir','rental'));
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

    public function edits($id)
    {
       
        $rental = rental::findOrFail($id);
        $back = back::all();
        return view('back.edits', compact('rental','back'));
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

        $transaksi = $request->all();

        $mobil= Mobil::all();
        // dd($mobil);
        $hargasewa = $mobil->harga_sewamobil;
        // dd($hargasewa);
        $supir = Supir::where('id', $transaksi['supir_id'])->first();

        $rental = rental::findOrFail($id);;
        $rental->no_identitaskons=$request->no_identitas;
        $rental->namakons =$request->nama;
        $rental->jkkons=$request->jk;
        $rental->alamatkons=$request->alamat;
        $rental->no_hpkons=$request->no_hp;
        $rental->total_sewa=($hargasewa + $supir->harga_sewasupir) * $request->jumlah_hari;
        $rental->tgl_sewa=$request->tgl_sewa;
        $rental->tgl_kembali=$request->tgl_kembali;
        $rental->jumlah_hari=$request->jumlah_hari;
        $rental->supir_id=$request->supir_id;
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
        $rental = rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('rental.index');
    }
}
