@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Tayangan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Judul Film</label>	
			  			<input type="text" name="judul_film" class="form-control" value="{{ $mhs->judul_film }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Waktu</label>
						<input type="text" name="waktu" class="form-control" value="{{ $mhs->waktu }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Ruangan</label>
						<input type="number" name="ruangan_id" class="form-control" value="{{ $mhs->ruangan->no_ruangan }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection