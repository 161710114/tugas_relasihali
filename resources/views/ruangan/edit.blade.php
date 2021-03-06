@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Ruangan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('ruangan.update',$a->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('no_ruangan') ? ' has-error' : '' }}">
			  			<label class="control-label">kode Ruangan</label>	
			  			<input type="number" name="no_ruangan" class="form-control" value="{{ $a->no_ruangan }}"  required>
			  			@if ($errors->has('no_ruangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_ruangan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_ruangan') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Ruangan</label>	
			  			<input type="text" name="nama_ruangan" class="form-control" value="{{ $a->nama_ruangan }}"  required>
			  			@if ($errors->has('nama_ruangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_ruangan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection