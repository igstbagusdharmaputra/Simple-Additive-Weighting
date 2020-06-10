<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    protected $table = 'temp';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nilai_matrix', 
        'result'
    ];

 
    protected $hidden = [

    ];  
}
