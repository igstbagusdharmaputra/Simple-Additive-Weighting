<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PenggunaDashboardController extends Controller
{
    public function index()
    {
    	$data = [
    		'title' => 'Dashboard Petani'
    	];
        return view('dashboard_pengguna.index', $data);
    }
}
