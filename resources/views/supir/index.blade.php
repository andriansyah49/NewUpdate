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
<section class="content-header">
    <h1>
    	Data Supir
    </h1>
    <ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   		<li class="active">Supir</li>
   	</ol>
</section><br><br><br>

@if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

<div class="box">
            <div class="box-header" style="background: #9932cc">
              <h3 class="box-title"><font color="white" >Data Supir</font></h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('supir.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                 	<th>No</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Harga Sewa /Hari</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($supir as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->namasupir}}</td>
					<td>{{$data->jksupir}}</td>
					<td>Rp.{{number_format($data->harga_sewasupir,2,',','.')}}</td>
					<td>
            <form action="{{route('supir.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data Supir" class="btn btn-success" href="/supir/{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
            <a data-toggle="tooltip" data-placement="top" title="Detail Supir" class="btn btn-warning" href="/supir/{{$data->id}}/"><i class="fa fa-info"></i></a>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data Supir" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')"><i class="fa fa-trash"></i></button>
            {{csrf_field()}}
          </form>
          </td>
				</tr>
				@endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@section('scripts')
<script type="text/javascript">
	$('#data').DataTable(); 
</script>
@endsection
