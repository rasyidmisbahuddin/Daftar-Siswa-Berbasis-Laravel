 @extends('template')

 @section('main')
     <div id="mahasiswa">
         <h2>Detail Mahasiswa</h2>

         <table class="table">
             <tr>
                 <th>No Mahasiswa</th>
                <td>{{ $mahasiswa->nomhsw }}</td>
            </tr>
            <tr>
                <th>Nama Mahasiswa </th>
                <td>{{ $mahasiswa->nama_mahasiswa }}</td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>{{ $mahasiswa->semester->nama_semester }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $mahasiswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ !empty($mahasiswa->telepon->nomor_telepon) ? $mahasiswa->telepon->nomor_telepon : '-' }}</td>
            </tr>
            <tr>
                <th>Jurusan yang diminati </th>
                <td>
                @foreach($mahasiswa->jurusan as $item)
                <strong><span>{{ $item->nama_jurusan }}</span></strong>
                @endforeach
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if (isset($mahasiswa->foto))
                        <img src="{{ asset('fotoupload/' . $mahasiswa->foto) }}">
                    @else
                        @if ($mahasiswa->jenis_kelamin == 'L')
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
@stop

@section('footer')
    @include('footer')
@stop