@extends('layouts.frist')
@section('sidebar')
@role('admin')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li><a href="{{route('user.index')}}"><i class="fa fa-user text-green"></i>   <span>Pengguna</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li class="active"><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li class="active"><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole
  
@endsection
@section('content')
<section class="content-header">
  <h1>
    Detail Mobil
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <a href="/rental/index">Data Rental</a><li class="active">Detail Data</li>
  </ol>
</section><br><br>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Data</h3>

    <div class="box-tools pull-right">
    </div>
  </div>
            <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <tr style="border-top:1px black solid;border-bottom:1px black solid;">
          <td width="300"><font size="4px"><b>No Identitas</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->no_identitaskons}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Nama</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->namakons}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Jenis Kelamin</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->jkkons}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Alamat</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->alamatkons}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>No HP</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->no_hpkons}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Merk Mobil</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->mobil->merk}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Plat Nomor</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->mobil->plat_no}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Harga Sewa Mobil</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">Rp.{{number_format($rental->mobil->harga_sewamobil,2,',','.')}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Nama Supir</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->supir->namasupir}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Harga Sewa Supir</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">Rp.{{number_format($rental->supir->harga_sewasupir,2,',','.')}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Tanggal Sewa Mobil</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->tgl_sewa}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Tanggal Pengembalian</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->tgl_kembali}}</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Jumlah Hari</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">{{$rental->jumlah_hari}} Hari</font></td>
        </tr>
        <tr style="border-top:1px black solid;border-bottom:1px black solid;" >
          <td><font size="4px"><b>Total Sewa</b></font></td><td width="30px">&nbsp<b>:</b>&nbsp</td><td><font size="4px">Rp.{{number_format($rental->total_sewa,2,',','.')}}</font></td>
        </tr>
      </table>
    </div>
  </div>
  </div>
</div>
@endsection

