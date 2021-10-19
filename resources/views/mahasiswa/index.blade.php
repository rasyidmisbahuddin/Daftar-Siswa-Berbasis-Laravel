 @extends('template')

 @section('main')
     <div id="mahasiswa">
         <h2>Daftar Mahasiswa</h2>

         @include('_partial.flash_message')

         @include('mahasiswa.form_pencarian')

         @if (!empty($mahasiswa_list))
             <table class="table">
                 <thead>
                    <tr>
                        <th>No Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Semester</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa_list as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nomhsw }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->semester->nama_semester }}</td>
                        <td>{{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ !empty($mahasiswa->telepon->nomor_telepon) ? $mahasiswa->telepon->nomor_telepon : '-' }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('mahasiswa/' . $mahasiswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                            </div>

                            @if (Auth::check())
                            <div class="box-button">
                                {{ link_to('mahasiswa/' . $mahasiswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['mahasiswaController@destroy', $mahasiswa->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Tidak ada data mahasiswa.</p>
            @endif

        <div class="table">
             <div class="jumlah-data">
                 <strong> Jumlah mahasiswa yang tertampil: {{ $jumlah_mahasiswa }} </strong>
             </div>
             <div class="paging">
                {{ $mahasiswa_list->links() }}
            </div>
        </div>

        @if (Auth::check())
        <div class="tombol-nav">
            <a href="{{ url('mahasiswa/create') }}" class="btn btn-primary">Tambah mahasiswa</a>
        </div>
        @endif

    </div> <!-- / #mahasiswa -->
@stop


@section('footer')
    @include('footer')
@stop
