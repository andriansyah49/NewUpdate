    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Mobil;
use App\Supir;
use App\Konsumen;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sewa=Sewa::with('mobil','supir','konsumen')->get();
        return view('sewa.index',compact('sewa','supir','konsumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mobil=Mobil::all();
        $supir=Supir::all();
        $konsumen=Konsumen::all();
        return view('sewa.create',compact('mobil','supir','konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $transaksi = $request->all();

        $mobil = Mobil::where('id', $transaksi['mobil_id'])->first();
        // dd($mobil);
        $hargasewa = $mobil->harga_sewa;
        // dd($hargasewa);
        $supir = Supir::where('id', $transaksi['b'])->first();

        $sewa = new Sewa;
        $sewa->tgl_sewa=$request->tgl_sewa;
        $sewa->jum_hari =$request->jum_hari;
        $sewa->total_sewa= ($hargasewa * $request->jum_hari) + $supir->harga_sewa;
        
        $sewa->konsumen_id=$request->id_konsumen;
        $sewa->mobil_id= $request->mobil_id;
        $sewa->supir_id= $request->b;
        // dd($sewa);
        $sewa->save();
        return redirect('sewa');
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
        $mobil=Mobil::all();
        $supir=Supir::all();
        $konsumen=Konsumen::all();
        $sewa = Sewa::findOrFail($id);
        return view('sewa.detail',compact('sewa','mobil','supir','konsumen'));
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
        $mobil=Mobil::all();
        $supir=Supir::all();
        $konsumen=Konsumen::all();
        $sewa = Sewa::findOrFail($id);
        return view('sewa.edit',compact('sewa','mobil','supir','konsumen'));
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
        $transaksi = $request->all();

        $mobil = Mobil::where('id', $transaksi['mobil_id'])->first();
        // dd($mobil);
        $hargasewa = $mobil->harga_sewamobil;
        // dd($hargasewa);
        $supir = Supir::where('id', $transaksi['b'])->first();

        $sewa =Sewa::findOrFail($id);
        $sewa->tgl_sewa=$request->tgl_sewa;
        $sewa->jum_hari =$request->jum_hari;
        $sewa->total_sewa= ($hargasewa * $request->jum_hari) + $supir->harga_sewa;
        
        $sewa->konsumen_id=$request->id_konsumen;
        $sewa->mobil_id= $request->mobil_id;
        $sewa->supir_id= $request->b;
        //dd($sewa);
        $sewa->save();
        return redirect('sewa');
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
        $sewa = Sewa::findOrFail($id);
        $sewa->delete();
        return redirect('sewa');
    }
}
