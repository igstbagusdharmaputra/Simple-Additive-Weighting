<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo" style="font-size: 1.182982em; color:#FFFFFF">
            Simple Additive Weighting (SAW)
            {{-- <a href="index.html"><img src="{{ asset('images/icon/logo.png') }}" alt="logo"></a> --}}
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li @if(Request::is('/control-panel')) {{ 'class=active' }} @endif ><a href="{{ route('admin.dashboard') }}"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                    <li @if(Request::is('/control-panel/kriteria')) {{ 'class=active' }} @endif ><a href="{{ route('kriteria.index') }}"><i class="ti-book"></i> <span>Data Kriteria</span></a></li>
                    <li @if(Request::is('/control-panel/pengguna')) {{ 'class=active' }} @endif ><a href="{{ route('pengguna.index') }}"><i class="ti-user"></i> <span>Data Pengguna</span></a></li>
                    <li @if(Request::is('/control-panel/tanaman')) {{ 'class=active' }} @endif ><a href="{{ route('tanaman.index') }}"><i class="ti-heart"></i> <span>Data Tanaman</span></a></li>
                    <li @if(Request::is('/control-panel/saw')) {{ 'class=active' }} @endif ><a href="{{ route('saw.index') }}"><i class="ti-bookmark"></i> <span>Data Rekomendasi</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->