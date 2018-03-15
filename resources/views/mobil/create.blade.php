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
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Tambah Data Mobil
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Mobil</li><li class="active">Tambah Mobil</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Tambah Data Mobil
		</div>

		<div class="panel-body">
		<form action="{{route('mobil.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label class="control-lable">Foto</label>
				{!! Form::file('fotomobil', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group{{ $errors->has('plat_no') ? ' has-error' : '' }}">
				<label class="control-lable">Plat Nomor</label>
				{!! Form::text('plat_no', null, ['class'=>'form-control']) !!}
				{!! $errors->first('plat_no', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group">
				<label class="control-lable">Merk</label>
				<input type="text" name="merk" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Spesifikasi</label>
				<textarea class="form-control" name="spesifikasi" required=""></textarea>
			</div>

			<div class="form-group">
				<label class="control-lable">Harga Sewa</label>
				<input placeholder="0" type="number" name="harga_sewamobil" class="form-control" required="">
			</div><br>

			<input type="hidden" name="status" value="Tidak">

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
@endsection