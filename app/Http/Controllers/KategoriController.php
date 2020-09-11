<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use DB;
class KategoriController extends Controller
{
    public function data(){
        // $sql = "WITH recursive tree_kategori AS (
        //     SELECT id,name,parent_id, 1 AS lvl FROM categories
        //     WHERE parent_id IS NULL
        //     UNION ALL
        //     SELECT k.id,k.name,k.parent_id, lvl+1 FROM categories AS k
        //     INNER JOIN tree_kategori AS tk ON k.parent_id = tk.id
        // )
        // SELECT * FROM tree_kategori
        
        //  ";
        //  $tree = DB::select(DB::raw($sql));
        $root = [];
        $categories = Kategori::all();
        $level = 0;
        foreach ($categories->where('parent_id',NULL) as $kategori){
            $child  = $this->getChild($kategori->id,$categories,$level);
            $data = [
                'nama_kategori' => $kategori->name,
                'level' => $level,
                'child' => $child,
            ];
            array_push($root,$data);
        }
        return response()->json([
            'data' => $root, 
            'success' => true
        ]);
    }
    public function getChild($id,$categories,$level=0){
        $level++;
        $category_child = $categories->where('parent_id',$id);
        $data = [];
        if(count($category_child)>0){
            foreach($category_child as $category){
                $child = $this->getChild($category->id,$categories,$level);
                $obj = [
                    'nama_kategori' => $category->name,
                    'level' => $level,
                    'child' => $child,
                    
                ];
                
                array_push($data,$obj);
            }
            return $data;  
        }
    }
    public function store(){

    }
    public function create(){

    }
    public function show(){
        
    }
}
