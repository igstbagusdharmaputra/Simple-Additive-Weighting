<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;   
class KriteriaController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Data Kriteria'
        ];
        return view('kriteria.index',$data);
    }
    public function destroy($id){
        try{
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->delete();
            return redirect()->route('kriteria.index')
                             ->with('status', msg('Data berhasil dihapus', 'success'));
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('kriteria.index')
            ->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));  
        }
    }
    public function showData(Request $request){
        try{
            $data = Kriteria::select(
                'data_kriteria.*'
            )
            ->get()
            ->toArray();

            $no = 1;
            foreach ($data as $key => $item) {
                $data[$key]['num'] = $no;
                $data[$key]['action'] = '
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-dark btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
                        <a class="dropdown-item text-warning" href="'.route('kriteria.edit', [$data[$key]['id']]).'"><i class="ti-check-box"></i> Edit</a>
                        <button type="button" class="btn-link dropdown-item text-danger btn-delete" data-id="'.$data[$key]['id'].'"><i class="ti-trash"></i> Hapus</button>
                        <form method="POST" id="form-delete-'.$data[$key]['id'].'" style="display: inline" action="'.route('kriteria.destroy',[$data[$key]['id']]).'">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                        </form>
                    </div>
                </div>
                ';
                $no++;
            }
            
            return response()->json([
                'error'   => false,
                'data'    => $data
            ]);

        }catch (\Illuminate\Database\QueryException $e){
            $data = [
                'error'   => $e->errorInfo[2],
                'data'    => [],
            ];

            return response()->json($data);
        }
    }
    public function insert(){
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('kriteria.insert',$data);
    }
    public function store(Request $request){
        try {
          $input = $this->validate(request(),[
                'nama_kriteria'      => 'max:150|string|required',
                'atribut'    => 'string|required',
                'bobot'     => 'required|between:0,99.99'
          ]);

          $dataForInsert = [
                'nama_kriteria'      => $input['nama_kriteria'],
                'atribut'    => $input['atribut'],
                'bobot'    => $input['bobot']
          ];

          Kriteria::create($dataForInsert);

          return redirect()->route('kriteria.index')->with('status', msg('Data berhasil disimpan', 'success'));

        } catch (\Illuminate\Database\QueryException $e) {
          return redirect()->route('kriteria.insert')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function update($id){
        try {
            $input = $this->validate(request(),[
                'nama_kriteria'      => 'max:150|string|required',
                'atribut'    => 'string|required',
                'bobot'     => 'required|between:0,99.99'
            ]);

            
            //cek kriteria apakah ada atau tidak
            //jika tidak 404 not found

            $kriteria = Kriteria::findorFail($id);


            $dataForUpdate = [
                'nama_kriteria'      => $input['nama_kriteria'],
                'atribut'    => $input['atribut'],
                'bobot'    => $input['bobot']
            ];

            
            //melakukan proses update
            $kriteria->update($dataForUpdate);

            return redirect()->route('kriteria.index')
                             ->with('status', msg('Data berhasil dirubah', 'success'));

        } catch (\Illuminate\Database\QueryException $e) {

            return redirect()->route('kriteria.edit', [$id])
                             ->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function edit($id){
        $item = Kriteria::findorFail($id);
        $data = [
            'title' => 'Edit Kriteria',
            'item' => $item
        ];

        return view('kriteria.edit', $data);
    }
    public function test(){
        $data = Kriteria::all();
        $temp =array();

        foreach ($data as $item) {
           $temp[$item['nama_kriteria']] = $item['bobot'];
        }
        foreach ($temp as $key) {
            echo $key;
        }
    }
}
