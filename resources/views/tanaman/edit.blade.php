@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
                <li><span>Edit</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tanaman.update',[$item->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label">Nama Tanaman</label>
                            <input type="text" class="form-control" name="nama_tanaman" value="{{ empty(old('nama_tanaman')) ? $item->nama_tanaman : old('nama_tanaman') }}">
                            @if ($errors->has('nama_tanaman'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_tanaman') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tekanan Udara</label>
                            <input type="text" class="form-control" name="tekanan_udara" value="{{ empty(old('tekanan_udara')) ? $item->tekanan_udara : old('tekanan_udara') }}">
                            @if ($errors->has('tekanan_udara'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tekanan_udara') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kecepatan Angin</label>
                            <input type="text" class="form-control" name="kecepatan_angin" value="{{ empty(old('kecepatan_angin')) ? $item->kecepatan_angin : old('kecepatan_angin') }}">
                            @if ($errors->has('kecepatan_angin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kecepatan_angin') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kelembaban Udara</label>
                            <input type="text" class="form-control" name="kelembaban_udara" value="{{ empty(old('kelembaban_udara')) ? $item->kelembaban_udara : old('kelembaban_udara') }}">
                            @if ($errors->has('kelembaban_udara'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kelembaban_udara') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Penyinaran Matahari</label>
                            <input type="text" class="form-control" name="penyinaran_matahari" value="{{ empty(old('penyinaran_matahari')) ? $item->penyinaran_matahari : old('penyinaran_matahari') }}">
                            @if ($errors->has('penyinaran_matahari'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('penyinaran_matahari') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jumlah Curah Hujan</label>
                            <input type="text" class="form-control" name="jumlah_curah_hujan" value="{{ empty(old('jumlah_curah_hujan')) ? $item->jumlah_curah_hujan : old('jumlah_curah_hujan') }}">
                            @if ($errors->has('jumlah_curah_hujan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jumlah_curah_hujan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Suhu</label>
                            <input type="text" class="form-control" name="suhu" value="{{ empty(old('suhu')) ? $item->suhu : old('suhu') }}">
                            @if ($errors->has('suhu'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('suhu') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Waktu</label>    
                            <input type="date" name="waktu" class="form-control" min="date" value="{{ empty(old('waktu')) ? $item->waktu : old('waktu') }}">
                            @if ($errors->has('waktu'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('waktu') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                </div>
                    <div class="card-footer">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-warning">Edit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>    
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection