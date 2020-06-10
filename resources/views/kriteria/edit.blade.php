@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
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
                    <form action="{{ route('kriteria.update',[$item->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="form-group">
                            <label class="col-form-label">Nama Kriteria</label>
                            <input type="text" class="form-control" name="nama_kriteria" value="{{ empty(old('nama_kriteria')) ? $item->nama_kriteria : old('nama_kriteria') }}">
                            @if ($errors->has('nama_kriteria'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_kriteria') }}</strong>
                                </span>
                            @endif
                        </div> --}}
                        <div class="form-group">
                            <label class="col-form-label">Atribut</label>
                            <select name="atribut" class="custom-select">
                                <option value="">--- Pilih ---</option>
                                @foreach(atribut() as $value => $name)
                                    <option value="{{ $value }}" {{ ($value == $item->atribut ? 'selected' : ''  ) }}>{{ $name }}</option>

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
                                    <option value="{{ $value }}" {{ ($value == $item->bobot ? 'selected' : ''  ) }}>{{ $name }}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('bobot'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bobot') }}</strong>
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