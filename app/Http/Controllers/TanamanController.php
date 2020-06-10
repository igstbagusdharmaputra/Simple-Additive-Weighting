<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;
class TanamanController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Data Tanaman'
        ];
        return view('tanaman.index',$data);
    }
    public function insert(){
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('tanaman.insert',$data);
    }
    public function edit($id){
        $item = Tanaman::findorFail($id);
        $data = [
            'title' => 'Edit Tanaman',
            'item' => $item
        ];

        return view('tanaman.edit', $data);
    }
    public function showData(Request $request){
        try{
            $data = Tanaman::select(
                'data_tanaman.*'
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
                        <a class="dropdown-item text-warning" href="'.route('tanaman.edit', [$data[$key]['id']]).'"><i class="ti-check-box"></i> Edit</a>
                        <button type="button" class="btn-link dropdown-item text-danger btn-delete" data-id="'.$data[$key]['id'].'"><i class="ti-trash"></i> Hapus</button>
                        <form method="POST" id="form-delete-'.$data[$key]['id'].'" style="display: inline" action="'.route('tanaman.destroy',[$data[$key]['id']]).'">
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
    public function store(Request $request){
        try {
          $input = $this->validate(request(),[
                'nama_tanaman'          => 'max:150|string|required',
                'tekanan_udara'         => 'required|numeric',   
                'kecepatan_angin'       => 'required|numeric',
                'kelembaban_udara'      => 'required|numeric',
                'penyinaran_matahari'   => 'required|numeric',
                'jumlah_curah_hujan'    => 'required|numeric',
                'suhu'                  => 'required|numeric',
                'waktu'                 => 'date|required',
               
          ]);

          $dataForInsert = [
                'nama_tanaman'             => $input['nama_tanaman'],
                'tekanan_udara'            => $input['tekanan_udara'],
                'kecepatan_angin'          => $input['kecepatan_angin'],
                'kelembaban_udara'         => $input['kelembaban_udara'],
                'penyinaran_matahari'      => $input['penyinaran_matahari'],
                'jumlah_curah_hujan'       => $input['jumlah_curah_hujan'],
                'suhu'                     => $input['suhu'],
                'waktu'                    => $input['waktu'],
          ];

          Tanaman::create($dataForInsert);

          return redirect()->route('tanaman.index')->with('status', msg('Data berhasil disimpan', 'success'));

        } catch (\Illuminate\Database\QueryException $e) {
          return redirect()->route('tanaman.insert')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }

    public function update($id){
        try {
            $input = $this->validate(request(),[
                'nama_tanaman'          => 'max:150|string|required',
                'tekanan_udara'         => 'required|numeric',   
                'kecepatan_angin'       => 'required|numeric',
                'kelembaban_udara'      => 'required|numeric',
                'penyinaran_matahari'   => 'required|numeric',
                'jumlah_curah_hujan'    => 'required|numeric',
                'suhu'                  => 'required|numeric',
                'waktu'                 => 'date|required',
            ]);

            
            //cek Tanaman apakah ada atau tidak
            //jika tidak 404 not found

            $tanaman = Tanaman::findorFail($id);


            $dataForUpdate = [
                'nama_tanaman'             => $input['nama_tanaman'],
                'tekanan_udara'            => $input['tekanan_udara'],
                'kecepatan_angin'          => $input['kecepatan_angin'],
                'kelembaban_udara'         => $input['kelembaban_udara'],
                'penyinaran_matahari'      => $input['penyinaran_matahari'],
                'jumlah_curah_hujan'       => $input['jumlah_curah_hujan'],
                'suhu'                     => $input['suhu'],
                'waktu'                    => $input['waktu'],
            ];

            
            //melakukan proses update
            $tanaman->update($dataForUpdate);

            return redirect()->route('tanaman.index')
                             ->with('status', msg('Data berhasil dirubah', 'success'));

        } catch (\Illuminate\Database\QueryException $e) {

            return redirect()->route('tanaman.edit', [$id])
                             ->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function destroy($id){
        try{
            $tanaman = Tanaman::findOrFail($id);
            $tanaman->delete();
            return redirect()->route('tanaman.index')
                             ->with('status', msg('Data berhasil dihapus', 'success'));
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('tanaman.index')
            ->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));  
        }
    }
}
