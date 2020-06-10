<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $table = 'detail_users';
	protected $primaryKey = 'id_user';
    public $incrementing = false;
    
   
    protected $fillable = [
    	'id_user',
        'nama', 
        'jenis_kelamin',
        'no_telp',
        'tgl_lahir'
    ];

 
    protected $hidden = [

    ];
}
