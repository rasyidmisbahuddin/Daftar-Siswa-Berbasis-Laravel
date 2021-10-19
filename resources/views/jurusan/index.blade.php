 @extends('template')

 @section('main')
     <div id="jurusan">
         <h2>Jurusan yang diminati</h2>

         @include('_partial.flash_message')

         @if (count($jurusan_list) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Daftar Jurusan </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach($jurusan_list as $jurusan): ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('jurusan/' . $jurusan->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['jurusanController@destroy', $jurusan->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else
            <p>Tidak ada data jurusan.</p>
        @endif

        <div class="tombol-nav">
            <a href="jurusan/create" class="btn btn-primary">Tambah jurusan</a>
        </div>

    </div> <!-- / #jurusan -->
@stop

@section('footer')
   @include('footer')
@stop