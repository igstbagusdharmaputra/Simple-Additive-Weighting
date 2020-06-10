    @extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
                <li><span>Tambah</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis-Kelamin</label>
                            <select name="jenis_kelamin" class="custom-select">
                                <option value="">--- Pilih ---</option>
                                @foreach(getKelamin() as $value => $name)
                                    <option value="{{ $value }}" {{ ($value == old('jenis_kelamin') ? 'selected' : ''  ) }}>{{ $name }}</option>
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
                            <input type="date" name="tgl_lahir" class="form-control" min="date" value="{{ date('Y-m-d') }}">
                            @if ($errors->has('tgl_lahir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No. Telepon</label>
                            <input type="tel" name="no_telp" class="form-control" placeholder="ex. 08xxxxxxxx"pattern="[0-9]{9,15}" value="{{ old('no_telp') }}">
                            @if ($errors->has('no_telp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{old('username')}}">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" id="password-confirm" name="password" class="form-control" value="{{old('password')}}">
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
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                    <div class="card-footer">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
                        </div>    
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#btnReset').click(function(){
                btnFoto('remove')
            });
        });
    </script>
@endsection
