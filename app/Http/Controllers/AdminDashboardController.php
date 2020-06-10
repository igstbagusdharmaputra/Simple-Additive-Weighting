<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Soal;
use Hash;
use DB;
use Auth;

class AdminDashboardController extends Controller
{

	public function index()
    {
    	$data = [
    		'count' => [
    			'user' => User::where('roles', '=', 2)->count(),
    			
    		]
    	];
        return view('home', $data);
    }

    public function profile(){
        $user = User::where('id', '=', Auth::user()->id)->firstOrFail();

        $data = [
            'title' => 'Edit Profile',
            'item' => $user
        ];

        return view('profile', $data);
    }

    public function profileUpdate(){
        DB::beginTransaction();
        try {
            $user = User::where('id','=', Auth::user()->id)->firstOrFail();

            $input = $this->validate(request(),[
                'email'          => 'max:150|string|required|email',
                'username'       => 'max:150|string|required|without_spaces',
                'password'       => 'nullable|max:150|string|confirmed|min:6'
            ]);

            $dataForUpdate = [];

            if(!empty($input['password'])){
                $dataForUpdate['password'] = Hash::make($input['password']);
            }

            //cek kalo email tidak sama dengan di database
            if($user->email != $input['email']){
                //cek kalo email yang baru tidak ada yang punya
                if(User::where('email', '=', $input['email'])->count() ==  0){
                    $dataForUpdate['email'] = $input['email'];
                }else{
                    return back()->withInput()->with('status', msg('Email '.$input['email'].' sudah ada dalam database', 'danger'));
                }
            }

            //cek kalo username tidak sama dengan di database
            if($user->username != $input['username']){
                //cek kalo username yang baru tidak ada yang punya
                if(User::where('username', '=', $input['username'])->count() ==  0){
                    $dataForUpdate['username'] = $input['username'];
                }else{
                    return back()->withInput()->with('status', msg('Username '.$input['username'].' sudah ada dalam database', 'danger'));
                }
            }

            $user->update($dataForUpdate);

            DB::commit();
            return redirect()->route('admin.dashboard.profile')->with('status', msg('Data berhasil dirubah', 'success'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('admin.dashboard.profile')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
}
