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
<section class="content-header">
    <h1>
    	Data Mobil
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">Mobil</li>
   	</ol>
</section><br><br><br>

<div class="box">
  <div class="box-header" style="background: #9932cc">
    <h3 class="box-title" >Data Mobil</h3>
  </div><br>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="data" class="table table-striped">
        <thead>
          <tr>
          <th>No</th>
    			<th>No Identitas konsumen</th>
    			<th>Nama konsumen</th>
    			<th>Alamat Konsumen</th>
    			<th>Tanggal Pengembalian</th>
    			<th>Action</th>
              </tr>
            </thead>
            <tbody>
    			@php $no=1 @endphp
    			@foreach($back as $data)
    			<tr>
    				<td>{{$no++}}</td>
    				<td>{{$data->no_identitaskons}}</td>
    				<td>{{$data->namakons}}</td>
    				<td>{{$data->alamatkons}}</td>
    				<td>{{$data->tgl_kembali_akhir}}</td>
    				<td>
    				<form action="{{route('back.destroy',$data->id)}}" method="post">
            		<input type="hidden" name="_method" value="Delete">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">

            		<button data-toggle="tooltip" data-placement="top" title="Hapus Data" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')"><i class="fa fa-trash"></i></button>

            		<a data-toggle="tooltip" data-placement="top" title="Detail Data Rental" class="btn btn-warning" href="/back/{{$data->id}}/"><i class="fa fa-info"></i></a>

            	{{csrf_field()}}
          		</form>

				</td>
			</tr>
			@endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
	$('#data').DataTable(); 
</script>
@endsection
