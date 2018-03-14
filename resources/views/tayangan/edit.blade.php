@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Tayangan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('tayangan.update',$mhs->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('judul_film') ? ' has-error' : '' }}">
			  			<label class="control-label">judul_film </label>	
			  			<input type="text" name="judul_film" class="form-control" value="{{ $mhs->judul_film }}" required>
			  			@if ($errors->has('judul_film'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul_film') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('waktu') ? ' has-error' : '' }}">
			  			<label class="control-label">Waktu</label>	
			  			<input type="text" value="{{ $mhs->waktu }}" name="waktu" class="form-control"  required>
			  			@if ($errors->has('waktu'))
                            <span class="help-block">
                                <strong>{{ $errors->first('waktu') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('ruangan_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Ruangan</label>	
			  			<select name="ruangan_id" class="form-control">
			  				@foreach($ruangan as $data)
			  				<option value="{{ $data->id }}" {{ $selectedruangan == $data->id ? 'selected="selected"' : '' }} >{{ $data->no_ruangan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('ruangan_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ruangan_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection