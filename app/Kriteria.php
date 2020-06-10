<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'data_kriteria';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
   
    protected $fillable = [
        'nama_kriteria', 
        'atribut',
        'bobot'
    ];

 
    protected $hidden = [

    ];    
}
