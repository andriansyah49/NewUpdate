@extends('layouts.frist')
@section('sidebar')
@role('admin')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li class="active"><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
  <li><a href="{{route('user.index')}}"><i class="fa fa-user text-green"></i>   <span>Pengguna</span></a></li>
  <li class="header">TRANSAKSI</li>
  <li><a href="{{url('/mobil/daftar')}}"><i class="fa fa-circle-o text-red"></i> <span>Daftar Mobil</span></a></li>
  <li><a href="{{route('rental.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Data Rental Mobil</span></a></li>
  <li><a href="{{route('back.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Laporan Pengembalian</span></a></li>
@endrole

@role('member')
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('/home')}}"><i class="fa fa-dashboard text-red"></i>   <span>Dashboard</span></a></li>
  <li><a href="{{route('mobil.index')}}"><i class="fa fa-car text-aqua"></i>   <span>Mobil</span></a></li>
  <li class="active"><a href="{{route('supir.index')}}"><i class="fa fa-user text-red"></i>   <span>Supir</span></a></li>
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
    		   Tambah Data Supir
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Supir</li><li class="active">Tambah Supir</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-primary">
			<div class="panel-heading" style="background: #9932cc">Tambah Supir
		</div>

		<div class="panel-body">
		<form action="{{route('supir.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="status" value="Tidak">
			<div class="form-group">
				<label class="control-lable">Foto</label>
				<input type="file" name="fotosupir" class="form-control" required="">
			</div>

			<div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
				<label class="control-lable">No Identitas</label>
				<input type="number" name="no_identitas" class="form-control">
				{!! $errors->first('no_identitas', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Jenis Kelamin</label><br>
				<select class="form-control" name="jk">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
					<option value="Lainnya">Lainnya</option>
				</select>
			</div>

			<div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
				<label class="control-lable">No HP</label>
				<input type="number" placeholder="08xxxxxxxxxx" name="no_hp" class="form-control" required="">
				{!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group">
				<label class="control-lable">Alamat</label>
				<textarea class="form-control" name="alamat"></textarea>
			</div>

			<div class="form-group">
				<label class="control-lable">Harga Sewa</label>
				<input type="number" placeholder="0" name="harga" class="form-control" required="">
			</div><br>
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