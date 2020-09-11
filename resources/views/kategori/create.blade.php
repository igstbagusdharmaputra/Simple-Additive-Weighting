@extends('layouts.app')
@section('breadcrumbs')
	<div class="col-sm-6">
		<div class="breadcrumbs-area clearfix">
			<h4 class="page-title pull-left">{{$title}}</h4>
			<ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
				<li><span>Data Kriteria</span></li>
			</ul>
		</div>
    </div>
@endsection
@section('css')
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.jqueryui.min.css') }}">
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kriteria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="col-form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" value="{{ old('nama_kriteria') }}">
                        @if ($errors->has('nama_kriteria'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama_kriteria') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Atribut</label>
                        <select name="atribut" class="custom-select">
                            <option value="">--- Pilih ---</option>
                            @foreach(atribut() as $value => $name)
                                <option value="{{ $value }}" {{ ($value == old('atribut') ? 'selected' : ''  ) }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('atribut'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('atribut') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Bobot</label>
                        <select name="bobot" class="custom-select">
                            <option value="">--- Pilih ---</option>
                            @foreach(getBobot() as $value => $name)
                                <option value="{{ $value }}" {{ ($value == old('bobot') ? 'selected' : ''  ) }}>{{ $name.' ('.$value.')' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection