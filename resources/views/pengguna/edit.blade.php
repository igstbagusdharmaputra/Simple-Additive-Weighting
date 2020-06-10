@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
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
                    <form action="{{ route('pengguna.update',[$item->id_user]) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama" value="{{ empty(old('nama')) ? $item->nama : old('nama') }}">
                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="custom-select">
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach(getKelamin() as $value => $name)
                                    <option value="{{ $value }}" {{ ($value == $item->jenis_kelamin ? 'selected' : ''  ) }}>{{ $name }}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>    
                            <input type="date" name="tgl_lahir" class="form-control" min="date" value="{{ empty(old('tgl_lahir')) ? $item->tgl_lahir : old('tgl_lahir') }}">
                            @if ($errors->has('tgl_lahir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No. Telepon</label>
                            <input type="tel" name="no_telp" class="form-control" placeholder="ex. 08xxxxxxxx"pattern="[0-9]{9,15}" value="{{ empty(old('no_telp')) ? $item->no_telp : old('no_telp') }}">
                            @if ($errors->has('no_telp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ empty(old('username')) ? $item->username : old('username') }}">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="Password" id="password-confirm" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Confirmation Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ empty(old('email')) ? $item->email : old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
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