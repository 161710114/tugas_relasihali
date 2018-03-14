@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Ruangan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Kode Ruangan</label>	
			  			<input type="text" name="no_ruangan" class="form-control" value="{{ $a->no_ruangan }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">nama_ruangan</label>	
			  			<input type="text" name="nama_ruangan" class="form-control" value="{{ $a->nama_ruangan }}"  readonly>
			  		</div>
			  		
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection