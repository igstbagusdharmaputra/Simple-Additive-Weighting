<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'data_tanaman';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
   
    protected $fillable = [
        'nama_tanaman', 
        'tekanan_udara',
        'kecepatan_angin',
        'kelembaban_udara',
        'penyinaran_matahari',
        'jumlah_curah_hujan',
        'suhu',
        'waktu'
    ];

 
    protected $hidden = [

    ];  
}
