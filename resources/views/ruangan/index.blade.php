@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Ruangan
			  	<div class="panel-title pull-right"><a href="{{ route('ruangan.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Kode Ruangan</th>
					  <th>Nama Ruangan</th>
					  <th>Tayangan Film</th>
					  <th>Waktu Tayangan</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($a as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->no_ruangan }}</td>
				    	<td><p>{{ $data->nama_ruangan }}</p></td>
				    	<td>@foreach($data->tayangan as $mhs)<li>{{ $mhs->judul_film }}@endforeach</li></td>
				    	<td>@foreach($data->tayangan as $mhs)<li>{{ $mhs->waktu }}@endforeach</li></td>

<td>
	<a class="btn btn-warning" href="{{ route('ruangan.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('ruangan.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('ruangan.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
		</td>
			</tr>
				 @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection