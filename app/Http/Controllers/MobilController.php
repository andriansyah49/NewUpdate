<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\rental;
use App\Supir;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $mobil=Mobil::all();
        return view('mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mobil.create');
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
        $this->validate($request, [
            'plat_no'=> 'required|unique:mobils,plat_no'
            ]);
        Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Menyimpan $request->merk"]);

        $mobil = new Mobil;
        $mobil->plat_no=$request->plat_no;
        $mobil->merk =$request->merk;
        $mobil->status =$request->status;
        $mobil->spesifikasi=$request->spesifikasi;
        $mobil->harga_sewamobil=$request->harga_sewamobil;
        if ($request->hasFile('fotomobil')){
            $file = $request->file('fotomobil');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $destinationPath = public_path().DIRECTORY_SEPARATOR .'img';
            $uploadSucces=$file->move($destinationPath,$filename);
            $mobil->fotomobil = $filename;

        
        }
        $mobil->save();
        return redirect('mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $mobil = Mobil::findOrFail($id);
        return view('mobil.detail', compact('mobil'));
    }
    
    public function show($id)
    {
        //
        $mobil = Mobil::paginate(6);
        return view('mobil.daftar', compact('mobil'));
    }

    

    public function daftar()
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
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
    }

    public function tambahrental($id)
    {
        //
        $mobil = Mobil::findOrFail($id);
        $supir = Supir::where('status','Tidak')->get();
        return view('mobil.tambahrental', compact('mobil','supir'));
    }

    public function editrental($id)
    {
        //
        $mobil=Mobil::all();
        $supir=Supir::all();
        $rental = rental::findOrFail($id);

        return view('mobil.editrental', compact('supir','mobil','rental'));
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
        $mobil = Mobil::findOrFail($id);
        $mobil->plat_no=$request->plat_no;
        $mobil->merk =$request->merk;
        $mobil->spesifikasi=$request->spesifikasi;
        $mobil->harga_sewamobil=$request->harga_sewamobil;

        if ($request->hasFile('fotomobil')){
            $file = $request->file('fotomobil');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $destinationPath = public_path().DIRECTORY_SEPARATOR .'img';
            $uploadSucces=$file->move($destinationPath,$filename);
            $mobil->fotomobil = $filename;

        
        }
        $mobil->save();

        return redirect('mobil');
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
            "message"=>"Data Mobil Berhasil Dihapus"
            ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
        return redirect()->route('mobil.index');
    }
}
