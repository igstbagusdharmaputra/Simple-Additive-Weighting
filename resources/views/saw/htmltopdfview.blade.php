<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
</style>

    @php
        $dateObj = DateTime::createFromFormat('!m', $bulan); 
    @endphp
    <h1>{{$dateObj->format('F')}},{{$tahun}}</h1>
    <table>
        <tr>
            <td>Nama Tanaman</td>
            <td>Tekanan Udara (mb)</td>
            <td>Kecepatan Angin (km/jam)</td>
            <td>Kelembaban Udara (%)</td>
            <td>Penyinaran Matahari (Jam)</td>
            <td>Jumlah Curah Hujan (mm/bulan)</td>
            <td>Suhu (°C)</td>
        </tr>
        @foreach ($item as $items)
        <tr>
            <td>{{$items->nama_tanaman}}</td>
            <td>{{$items->tekanan_udara}}</td>
            <td>{{$items->kecepatan_angin}}</td>
            <td>{{$items->kelembaban_udara}}</td>
            <td>{{$items->penyinaran_matahari}}</td>
            <td>{{$items->jumlah_curah_hujan}}</td>
            <td>{{$items->suhu}}</td>
        </tr>
        @endforeach
    </table>
</div>