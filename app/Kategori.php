<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'parent_id'
    ];
    public function parent()
    {
        return $this->belongsTo('App\Kategori', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Kategori', 'parent_id');
    }
   
}
