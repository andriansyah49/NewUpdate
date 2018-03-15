<?php

namespace App\Http\Controllers;

use App\Supir;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supir=Supir::where('i','ya')->get();
        return view('supir.index', compact('supir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supir.create');
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

        $this->Validate($request, [
            'no_identitas'=>'required|unique:supirs,no_identitassupir',
            'no_hp'=>'required|unique:supirs,no_hpsupir'
            ]);

        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menyimpan $request->nama"]);

        $supir = new Supir;
        $supir->no_identitassupir=$request->no_identitas;
        $supir->namasupir =$request->nama;
        $supir->i ='ya';
        $supir->jksupir=$request->jk;
        $supir->no_hpsupir=$request->no_hp;
        $supir->alamatsupir=$request->alamat;
        $supir->harga_sewasupir=$request->harga;
        $supir->status=$request->status;

        if ($request->hasFile('fotosupir')){
            $file = $request->file('fotosupir');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $destinationPath = public_path().DIRECTORY_SEPARATOR .'img';
            $uploadSucces=$file->move($destinationPath,$filename);
            $supir->fotosupir = $filename;

        
        }
        $supir->save();
        return redirect('supir');
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
        $supir = Supir::findOrFail($id);
        return view('supir.detail', compact('supir'));
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
        $supir = Supir::findOrFail($id);
        return view('supir.edit', compact('supir'));
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
        $supir = Supir::findOrFail($id);
        $supir->no_identitassupir=$request->no_identitas;
        $supir->namasupir =$request->nama;
        $supir->jksupir=$request->jk;
        $supir->no_hpsupir=$request->no_hp;
        $supir->alamatsupir=$request->alamat;
        $supir->harga_sewasupir=$request->harga;

        if ($request->hasFile('fotosupir')){
            $file = $request->file('fotosupir');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $destinationPath = public_path().DIRECTORY_SEPARATOR .'img';
            $uploadSucces=$file->move($destinationPath,$filename);
            $supir->fotosupir = $filename;
        
        }
        $supir->save();
        return redirect('supir');
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
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Data Supir Berhasil Dihapus"
            ]);

        $supir = Supir::findOrFail($id);
        $supir->delete();
        return redirect('supir');
    }
}
