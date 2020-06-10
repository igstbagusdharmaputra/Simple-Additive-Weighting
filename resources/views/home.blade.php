@extends('layouts.app')

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-3">
        <div class="alert alert-info">Selamat datang {{ Auth::user()->username }}</div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-user"></i> Pengguna</div>
                            <h2>{{ $count['user'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
