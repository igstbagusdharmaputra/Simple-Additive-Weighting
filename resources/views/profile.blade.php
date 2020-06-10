@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">{{$title}}</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><span>Edit Profile</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.dashboard.profile_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ empty(old('email')) ? $item->email : old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
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
                        
                    </div>
                    <div class="card-footer">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
                        </div>    
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
