@extends('TamplateAdmin')

@section('kontent')

    <p>Cari Data Dekan :</p>
    <form action="{{ url('/dekan/cari') }}" method="get">
        <input type="text" name="cari" placeholder="Cari Dekan .." value="{{ old('cari') }}">
        <input type="submit" value="Cari">
    </form>

    <h1>DATA DEKAN</h1>
    <form action="{{ url('dekan/tambahdekan') }}" method="post">
        {{ csrf_field() }}
        ID            : <input type="text" name="dekanid" required="required"><br>
        Nama          : <input type="text" name="namadekan" required="required"><br>
        Jabatan       : <input type="text" name="jabatan" required="required"><br>
        Dekan Jurusan : <input type="text" name="dekanjurusan" required="required"><br>
        Umur          : <input type="text" name="umur" required="required"><br>
        ALamat        : <input type="text" name="alamat" required="required"><br>
        <input type="submit" value="Simpan">
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Dekan Jurusan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th colspan="2">Aksi</th>
        </tr>
        @foreach($data_dekan as $data)
        <tr>
            <td>{{ $data->dekan_id }}</td>
            <td>{{ $data->dekan_nama }}</td>
            <td>{{ $data->dekan_jabatan }}</td>
            <td>{{ $data->dekan_jurusan }}</td>
            <td>{{ $data->dekan_umur }}</td>
            <td>{{ $data->dekan_alamat }}</td>
            <td>
                <!-- url link untuk edit -->
                <a href="{{ url('/dekan/edit/'.$data->dekan_id) }}">Edit</a> |
                <a href="{{ url('/dekan/hapus/'.$data->dekan_id) }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table><br><br>

    Halaman         : {{ $data_dekan->currentPage() }} <br>
    Jumlah Data     : {{ $data_dekan->total() }} <br>
    Data Perhalaman : {{ $data_dekan->perPage() }} <br/>

    {{ $data_dekan->links() }} <br>


@endsection