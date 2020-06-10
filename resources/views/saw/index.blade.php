@extends('layouts.app')

@section('breadcrumbs')
	<div class="col-sm-6">
		<div class="breadcrumbs-area clearfix">
			<h4 class="page-title pull-left">{{$title}}</h4>
			<ul class="breadcrumbs pull-left">
				<li><a href="{{ route('admin.dashboard') }}">Home</a></li>
				<li><span>Pengguna</span></li>
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
                <form action="{{ route('saw.index') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    @method('GET')
                    <div class="form-group">
                        <label>Masukan Waktu Bulan atau Tahun</label>    
                        <input type="date" name="waktu" class="form-control" min="date" value="{{ isset($_GET['waktu']) ? $_GET['waktu'] : date('Y-m-d') }}">
                        @if ($errors->has('waktu'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('waktu') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <button type="reset" class="btn btn-danger" id="btnReset">Reset</button>
                    </div>    
                </div>
                </form>
        </div>
    </div>
</div>

	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">
						Nilai Matrix
                    </h4>
                    <table class="table">
                        <tr>
                            <td>Tekanan Udara</td>
                            <td>Kecepatan Angin</td>
                            <td>Kelembaban Udara</td>
                            <td>Penyinaran Matahari</td>
                            <td>Jumlah Curah Hujan</td>
                            <td>Suhu</td>
                        </tr>
                        @foreach ($nilai_matrix as $item)
                        <tr>
                            <td>{{$item->tekanan_udara}}</td>
                            <td>{{$item->kecepatan_angin}}</td>
                            <td>{{$item->kelembaban_udara}}</td>
                            <td>{{$item->penyinaran_matahari}}</td>
                            <td>{{$item->jumlah_curah_hujan}}</td>
                            <td>{{$item->suhu}}</td>
                        </tr>
                        @endforeach
                    </table>
				</div>
			</div>
		</div>
    </div>
   
    <div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">
						Normalisasi Matrix
                    </h4>
                    <table class="table">
                        <tr>
                            <td>Tekanan Udara</td>
                            <td>Kecepatan Angin</td>
                            <td>Kelembaban Udara</td>
                            <td>Penyinaran Matahari</td>
                            <td>Jumlah Curah Hujan</td>
                            <td>Suhu</td>
                        </tr>
                        @for($i=0; $i<count($normalisasi); $i++)
                             <tr>
                                @for($j=0;$j<count($normalisasi[0]); $j++)
                                    <td>{{$normalisasi[$i][$j]}}</td>
                                @endfor
                            </tr>
                        @endfor
                    </table>
				</div>
			</div>
		</div>
    </div>
 
  
    <div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">
						Nilai Prefensi Matrix
                    </h4>
                    <table class="table">
                        <tr>
                            <td>Tekanan Udara</td>
                            <td>Kecepatan Angin</td>
                            <td>Kelembaban Udara</td>
                            <td>Penyinaran Matahari</td>
                            <td>Jumlah Curah Hujan</td>
                            <td>Suhu</td>
                        </tr>
                        @for($i=0; $i<count($normalisasi); $i++)
                             <tr>
                                @for($j=0;$j<count($normalisasi[0]); $j++)
                                    <td>{{$prefensi[$i][$j]}}</td>
                                @endfor
                            </tr>
                        @endfor
                    </table>
				</div>
			</div>
		</div>
    </div>
    
   
    <div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">
                        Nilai Prefensi Matrix
                    </h4>
                    {{-- <a href="{{ URL::to('/my-panel/export-pdf') }}" style="margin-left: 10px" class="btn btn-primary btn-xs">Export PDF</a> --}}
                    <table class="table">
                        <tr>
                            <td>Nama Tanaman</td>
                            <td>Nilai Prefensi</td>
                            <td>Ranking</td>
                        </tr>
                        @for($i=0; $i<count($result); $i++)
                             <tr>
                                @for($j=0;$j<count($result[0]); $j++)
                                    <td>{{$result[$i][$j]}}</td>
                                @endfor
                            </tr>
                        @endfor
                    </table>
				</div>
			</div>
		</div>
    </div>
 
@endsection

@section('js')
	<!-- Start datatable js -->
	<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>

	<script>
		$(document).ready(function(){
            $('#btnReset').click(function(){
                btnFoto('remove')
            });
        }); 

	</script>
@endsection
