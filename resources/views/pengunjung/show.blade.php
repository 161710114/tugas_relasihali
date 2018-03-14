@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pengunjung 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Pengunjung</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $wali->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">No Kursi</label>	
			  			<input type="text" name="no_kursi" class="form-control" value="{{ $wali->no_kursi }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Judul Film</label>	
			  			<input type="text" name="tayangan_id" class="form-control" value="{{ $wali->tayangan->judul_film }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection