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
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li class="active"><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li class="active"><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole
  
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Rental Mobil
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Rental</li><li class="active">Rental Mobil</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Rental Mobil
		</div>

		<div class="panel-body">
		<form action="{{route('back.update',$rental->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
				<input type="hidden" name="id" value="{{$rental->id}}">
				<input type="hidden" name="id_supir" value="{{$rental->supir_id}}">
				<input type="hidden" name="id_mobil" value="{{$rental->mobil_id}}">
				<input type="hidden" name="no_identitaskons" value="{{$rental->no_identitaskons}}">
				<input type="hidden" name="plat_no" value="{{$rental->mobil->plat_no}}">
				<input type="hidden" name="namakons" value="{{$rental->namakons}}">
				<input type="hidden" name="jkkons" value="{{$rental->jkkons}}">
				<input type="hidden" name="jumlah_hari_awal" value="{{$rental->jumlah_hari}}">
				<input type="hidden" name="total_sewa_awal" value="{{$rental->total_sewa}}">
				<input type="hidden" name="alamatkons" value="{{$rental->alamatkons}}">
				<input type="hidden" name="no_hpkons" value="{{$rental->no_hpkons}}">
				<input type="hidden" name="merk"  value="{{$rental->mobil->merk}}">
				<input type="hidden" name="harga_mobil" value="{{$rental->mobil->harga_sewamobil}}">
				<input type="hidden" name="nama_supir" value="{{$rental->supir->namasupir}}">
				<input type="hidden" name="harga_supir" value="{{$rental->supir->harga_sewasupir}}">
				<input type="hidden" name="tgl_sewa" value="{{$rental->tgl_sewa}}">
				<input type="hidden" name="tgl_kembali_awal" value="{{$rental->tgl_kembali}}">
			<div class="form-group">
			<div class="col-md-4">
				<div class="well">
					<center><b> Data Rental</b></center><br>
					Merk : <b>{{$rental->mobil->merk}}</b><br>
					Harga Sewa Mobil : <b>Rp. {{$rental->mobil->harga_sewamobil}}</b><br>
					Nama Supir : <b>{{$rental->supir->namasupir}}</b><br>
					Harga Sewa Supir : <b>Rp. {{$rental->supir->harga_sewasupir}}</b><br>
					Tanggal Sewa : <b>{{$rental->tgl_sewa}}</b><br>
					Tgl Kembali Awal : <b>{{$rental->tgl_kembali}}</b><br>
					Harga Sewa Mobil : <b>{{$rental->mobil->merk}}</b><br>
					Jumlah Hari : <b>{{$rental->jumlah_hari}} Hari</b><br>
					Total Sewa : <b>Rp. {{$rental->total_sewa}}</b><br>
				</div>
			</div>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			<input type="hidden" name="status" value="Tidak">

			<div class="form-group">
				<label class="control-lable">Tanggal Kembali Akhir</label>
				<input type="date" name="tgl_kembali_akhir" class="form-control" required="">
			</div>	

			<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			</div>
		</form>
	</div>
	</div>
</div>
</div>
@endsection