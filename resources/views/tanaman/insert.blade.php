@extends('layouts.app')
@section('breadcrumbs')
	<div class="col-sm-6">
		<div class="breadcrumbs-area clearfix">
			<h4 class="page-title pull-left">{{$title}}</h4>
			<ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
				<li><span>Data Tanaman</span></li>
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
                <form action="{{ route('tanaman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="col-form-label">Nama Tanaman</label>
                        <input type="text" class="form-control" name="nama_tanaman" value="{{ old('nama_tanaman') }}">
                        @if ($errors->has('nama_tanaman'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama_tanaman') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tekanan Udara</label>
                        <input type="text" name="tekanan_udara" class="form-control" value="{{old('tekanan_udara')}}">
                        @if ($errors->has('tekanan_udara'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tekanan_udara') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Kecepatan Angin</label>
                        <input type="text" name="kecepatan_angin" class="form-control" value="{{old('kecepatan_angin')}}">
                        @if ($errors->has('kecepatan_angin'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kecepatan_angin') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Kelembaban Udara</label>
                        <input type="text" name="kelembaban_udara" class="form-control" value="{{old('kelembaban_udara')}}">
                        @if ($errors->has('kelembaban_udara'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kelembaban_udara') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Penyinaran Matahari</label>
                        <input type="text" name="penyinaran_matahari" class="form-control" value="{{old('penyinaran_matahari')}}">
                        @if ($errors->has('penyinaran_matahari'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('penyinaran_matahari') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Jumlah Curah Hujan</label>
                        <input type="text" name="jumlah_curah_hujan" class="form-control" value="{{old('jumlah_curah_hujan')}}">
                        @if ($errors->has('jumlah_curah_hujan'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jumlah_curah_hujan') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Suhu</label>
                        <input type="text" name="suhu" class="form-control" value="{{old('suhu')}}">
                        @if ($errors->has('suhu'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('suhu') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>    
                        <input type="date" name="waktu" class="form-control" min="date" value="{{ date('Y-m-d') }}">
                        @if ($errors->has('waktu'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('waktu') }}</strong>
                            </span>
                        @endif
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
@section('js')
	<script>
		$(document).ready(function(){
            $('input[type="date"]').datepicker({
                format: 'MM'
            });
		})
	</script>
@endsection