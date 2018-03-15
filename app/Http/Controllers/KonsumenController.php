<?php

namespace App\Http\Controllers;

use App\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $konsumen=Konsumen::all();
        return view('konsumen.index',compact('konsumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('konsumen.create');
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
        $konsumen = new Konsumen;
        $konsumen->nama=$request->nama;
        $konsumen->jk =$request->jk;
        $konsumen->no_identitas=$request->no_identitas;
        $konsumen->no_hp=$request->no_hp;
        $konsumen->alamat=$request->alamat;
        $konsumen->save();
        return redirect('konsumen');

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
        $konsumen = Konsumen::findOrFail($id);
        return view('konsumen.detail', compact('konsumen'));
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
        $konsumen = Konsumen::findOrFail($id);
        return view('konsumen.edit', compact('konsumen'));
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
        $konsumen =Konsumen::findOrFail($id);
        $konsumen->nama=$request->nama;
        $konsumen->jk =$request->jk;
        $konsumen->no_identitas=$request->no_identitas;
        $konsumen->no_hp=$request->no_hp;
        $konsumen->alamat=$request->alamat;
        $konsumen->save();
        return redirect('konsumen');
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
        $konsumen = Konsumen::findOrFail($id);
        $konsumen->delete();
        return redirect('konsumen');
    }
}
