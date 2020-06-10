<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;
use App\Kriteria;
use PDF;
use Carbon\Carbon;

class SawController extends Controller
{


    public function index(Request $request){
        $date = Carbon::parse($request->input('waktu'));
        $month = $date->month;
        $year = $date->year;
        $nilai_matrix = Tanaman::select(
            'data_tanaman.*'
        )
        ->whereRaw('MONTH(data_tanaman.waktu) = '.$month.' and YEAR(data_tanaman.waktu) = '.$year)
        ->get();


        $data_kriteria = Kriteria::select(
            'data_kriteria.nama_kriteria','data_kriteria.atribut','data_kriteria.bobot'
        )
        ->get();
        if(count($nilai_matrix)>0){
            //kolom
        $j=0;
        //baris
        $i=0;
        $matrix = array(array());
        foreach($data_kriteria as $kriteria){

           if($kriteria['nama_kriteria']=="C1"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['tekanan_udara'];
                    $i++;
                }
               $i=0;
           }
           if($kriteria['nama_kriteria']=="C2"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['kecepatan_angin'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C3"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['kelembaban_udara'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C4"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['penyinaran_matahari'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C5"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['jumlah_curah_hujan'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C6"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['suhu'];
                    $i++;
                }
                $i=0;
            }
           $j++;
        }
        //maximum minimun value
        // 0 max 1 min
        $max_min = array(array());
        $baris = count($matrix);
        $kolom = count($matrix[0]);
        for ($j=0; $j<$kolom; $j++){
            $max = $matrix[0][$j];
            $min = 99999999;
            for ($i=0; $i<$baris; $i++){
                if($matrix[$i][$j] > $max){
                    $max = $matrix[$i][$j];
                }
                if($min > $matrix[$i][$j]){
                    $min = $matrix[$i][$j];
                }
            }
            $max_min[$j][0] = $max;
            $max_min[$j][1] = $min;
            $value=0;
        }


        $j=0;
        $i=0;
        $normalisasi =array(array());
        $bobot = array();
        foreach($data_kriteria as $kriteria){
            for($i=0; $i<$baris; $i++){
                if($kriteria['atribut']=="benefit"){
                    $normalisasi[$i][$j] = ($matrix[$i][$j]/$max_min[$j][0]);
                    // $this->result_normalisasi[$i][$j] = $normalisasi[$i][$j];
                }
                if($kriteria['atribut']=="cost"){
                    $normalisasi[$i][$j] = ($max_min[$j][1]/$matrix[$i][$j]);
                    // $this->result_normalisasi[$i][$j] = $normalisasi[$i][$j];
                }
             }
             $bobot[$j] = $kriteria['bobot'];
            $j++;
        }

        $nilai_prefensi = array(array());
        for($i=0; $i<$baris; $i++){
            for ($j=0; $j<$kolom; $j++){
                $nilai_prefensi[$i][$j] = $normalisasi[$i][$j] * $bobot[$j];
            }
        }
        $result = array(array());
        $i=0;
        $total=0;
        foreach ($nilai_matrix as $nilai){
            for ($j=0; $j<$kolom; $j++){
                $total+=$nilai_prefensi[$i][$j];
            }
            $result[$i][0] = $nilai['nama_tanaman'];
            $result[$i][1] =$total;
            $total=0;
            $i++;
        }
        array_multisort(array_map(function($result) {
            return $result[1];
        }, $result), SORT_DESC, $result);
        for($i=0; $i<$baris; $i++){
            $result[$i][2] = $i+1;
        }
        $data = [
            'title' => 'Rekomendasi',
            'nilai_matrix' => $nilai_matrix,
            'normalisasi' => $normalisasi,
            'prefensi' => $nilai_prefensi,
            'result' => $result
        ];
        return view('saw.index',$data);
        }else{
            echo "<script>";
            echo " alert('DATA KOSONG.');
            window.location.href='/control-panel/saw';
            </script>";

        }


    }

    public function index2(Request $request){
        $date = Carbon::parse($request->input('waktu'));
        $month = $date->month;
        $year = $date->year;
        $nilai_matrix = Tanaman::select(
            'data_tanaman.*'
        )
        ->whereRaw('MONTH(data_tanaman.waktu) = '.$month.' and YEAR(data_tanaman.waktu) = '.$year)
        ->get();


        $data_kriteria = Kriteria::select(
            'data_kriteria.nama_kriteria','data_kriteria.atribut','data_kriteria.bobot'
        )
        ->get();
        if(count($nilai_matrix)>0){
            //kolom
        $j=0;
        //baris
        $i=0;
        $matrix = array(array());
        foreach($data_kriteria as $kriteria){

           if($kriteria['nama_kriteria']=="C1"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['tekanan_udara'];
                    $i++;
                }
               $i=0;
           }
           if($kriteria['nama_kriteria']=="C2"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['kecepatan_angin'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C3"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['kelembaban_udara'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C4"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['penyinaran_matahari'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C5"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['jumlah_curah_hujan'];
                    $i++;
                }
                $i=0;
            }
            if($kriteria['nama_kriteria']=="C6"){
                foreach ($nilai_matrix as $nilai){
                    $matrix[$i][$j] = $nilai['suhu'];
                    $i++;
                }
                $i=0;
            }
           $j++;
        }
        //maximum minimun value
        // 0 max 1 min
        $max_min = array(array());
        $baris = count($matrix);
        $kolom = count($matrix[0]);
        for ($j=0; $j<$kolom; $j++){
            $max = $matrix[0][$j];
            $min = 99999999;
            for ($i=0; $i<$baris; $i++){
                if($matrix[$i][$j] > $max){
                    $max = $matrix[$i][$j];
                }
                if($min > $matrix[$i][$j]){
                    $min = $matrix[$i][$j];
                }
            }
            $max_min[$j][0] = $max;
            $max_min[$j][1] = $min;
            $value=0;
        }


        $j=0;
        $i=0;
        $normalisasi =array(array());
        $bobot = array();
        foreach($data_kriteria as $kriteria){
            for($i=0; $i<$baris; $i++){
                if($kriteria['atribut']=="benefit"){
                    $normalisasi[$i][$j] = ($matrix[$i][$j]/$max_min[$j][0]);
                    // $this->result_normalisasi[$i][$j] = $normalisasi[$i][$j];
                }
                if($kriteria['atribut']=="cost"){
                    $normalisasi[$i][$j] = ($max_min[$j][1]/$matrix[$i][$j]);
                    // $this->result_normalisasi[$i][$j] = $normalisasi[$i][$j];
                }
             }
             $bobot[$j] = $kriteria['bobot'];
            $j++;
        }

        $nilai_prefensi = array(array());
        for($i=0; $i<$baris; $i++){
            for ($j=0; $j<$kolom; $j++){
                $nilai_prefensi[$i][$j] = $normalisasi[$i][$j] * $bobot[$j];
            }
        }
        $result = array(array());
        $i=0;
        $total=0;
        foreach ($nilai_matrix as $nilai){
            for ($j=0; $j<$kolom; $j++){
                $total+=$nilai_prefensi[$i][$j];
            }
            $result[$i][0] = $nilai['nama_tanaman'];
            $result[$i][1] =$total;
            $total=0;
            $i++;
        }
        array_multisort(array_map(function($result) {
            return $result[1];
        }, $result), SORT_DESC, $result);
        for($i=0; $i<$baris; $i++){
            $result[$i][2] = $i+1;
        }

        $data = [
            'title' => 'Rekomendasi',
            'nilai_matrix' => $nilai_matrix,
            'result' => $result
        ];
        return view('saw.index2',$data);
        }else{
            echo "<script>";
            echo " alert('DATA KOSONG.');
            window.location.href='/my-panel/saw';
            </script>";
        }
    }

    public function htmltopdfview(Request $request){
        $date = Carbon::parse($request->input('waktu'));
        $month = $date->month;
        $year = $date->year;
        $tanaman = Tanaman::select(
            'data_tanaman.*'
        )
        ->whereRaw('MONTH(data_tanaman.waktu) = '.$month.' and YEAR(data_tanaman.waktu) = '.$year)
        ->get();
        $data = [
            'item' => $tanaman,
            'bulan' => $month,
            'tahun' => $year

        ];
        if($request->has('download')){
            $pdf = PDF::loadView('saw.htmltopdfview',$data);
            return $pdf->download('tanaman.pdf');
        }
        return view('saw.htmltopdfview',$data);
    }

}
