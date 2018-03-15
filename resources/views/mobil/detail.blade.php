@extends('layouts.frist')
@section('sidebar')
@role('admin')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li class="active"><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li><a href="{{route('user.index')}}"><i class="fa fa-user text-green"></i>   <span>Pengguna</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li class="active"><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
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
    <li class="fa fa-car">Mobil</li><li class="active">Detail Mobil</li>
  </ol>
</section><br><br>

<div class="box">
  <div class="box-body" style="background: white">
    <center>
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      {{csrf_field()}}
<br><br><br>
      <img width="500px" height="400px" src="{{asset('/img/'.$mobil->fotomobil.'')}}" />
      <font size="4px">
      <h3><b><u> Keterangan </u>  </b></h3><br>
      <span>
        <table border="5">
          <tr>
            <td><b>Plat Nomor&nbsp</b></td><td><b>:&nbsp</b></td><td>{{$mobil->plat_no}}</td>
          </tr>
          <tr>
            <td><b>Merk&nbsp</b></td><td><b>:&nbsp</b></td><td>{{$mobil->merk}}</td>
          </tr>
          <tr>
            <td><b>Harga Sewa&nbsp</b></td><td><b>:&nbsp</b></td><td>Rp.{{number_format($mobil->harga_sewamobil,2,',','.')}} <b>/Hari</b></td>
          </tr>
          <tr>
            <td><b>Spesifikasi&nbsp</b></td><td><b>:&nbsp</b></td></td><td>{{$mobil->spesifikasi}}</td>
          </tr>
        </table><br>
        
      </span>
      </font>
<br><br><br><br>
</center>
  </div>
</div>
 
@endsection

