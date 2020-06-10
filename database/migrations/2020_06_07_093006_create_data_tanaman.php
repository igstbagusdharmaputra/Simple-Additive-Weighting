<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTanaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tanaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tanaman');
            $table->double('tekanan_udara');
            $table->double('kecepatan_angin');
            $table->double('kelembaban_udara');
            $table->double('penyinaran_matahari');
            $table->double('jumlah_curah_hujan');
            $table->double('suhu');
            $table->date('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_tanaman');
    }
}
