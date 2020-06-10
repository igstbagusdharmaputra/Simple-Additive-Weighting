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
        {{$title}}
    </div>
@endsection

