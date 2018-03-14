@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Pengunjung 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pengunjung.update',$wali->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Pengunjung</label>	
			  			<input type="text" name="nama" value="{{ $wali->nama }}" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  			<div class="form-group {{ $errors->has('no_kursi') ? ' has-error' : '' }}">
			  			<label class="control-label">No kursi </label>	
			  			<input type="text" name="no_kursi" value="{{ $wali->no_kursi }}" class="form-control"  required>
			  			@if ($errors->has('no_kursi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_kursi') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('tayangan_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Film</label>	
			  			<select name="tayangan_id" class="form-control">
			  				@foreach($mhs as $data)
			  				<option value="{{ $data->id }}" {{ $selectedtayangan == $data->id ? 'selected="selected"' : '' }} >{{ $data->judul_film }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('tayangan_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tayangan_id') }}</strong>
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