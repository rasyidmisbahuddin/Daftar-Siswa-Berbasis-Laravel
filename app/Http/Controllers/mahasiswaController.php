<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use App\Telepon;
use App\semester;
use App\jurusan;
use App\Http\Requests\mahasiswaRequest;
use Storage;
use Session;


class mahasiswaController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'cari'
        ]]);
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | INDEX
    | -------------------------------------------------------------------------------------------------------
    */
    public function index() {
        $mahasiswa_list = mahasiswa::paginate(8);
        $jumlah_mahasiswa = mahasiswa::count();
        return view('mahasiswa.index', compact('mahasiswa_list', 'jumlah_mahasiswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | SHOW DETAIL
    | -------------------------------------------------------------------------------------------------------
    */
    public function show(mahasiswa $mahasiswa) {
        return view('mahasiswa.show', compact('mahasiswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function create() {
        return view('mahasiswa.create');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | EDIT
    | -------------------------------------------------------------------------------------------------------
    */
    public function edit(mahasiswa $mahasiswa) {
        if (!empty($mahasiswa->telepon->nomor_telepon)) {
            $mahasiswa->nomor_telepon = $mahasiswa->telepon->nomor_telepon;
        }

        return view('mahasiswa.edit', compact('mahasiswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function store(mahasiswaRequest $request) {
        $input = $request->all();

        // Upload foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        // Insert mahasiswa.
        $mahasiswa = mahasiswa::create($input);

        // Insert Telepon.
        if ($request->filled('nomor_telepon')) {
            $this->insertTelepon($mahasiswa, $request);
        }

        // Insert jurusan.
        $mahasiswa->jurusan()->attach($request->input('jurusan_mahasiswa'));

        // Flass message.
        Session::flash('flash_message', 'Data mahasiswa berhasil disimpan.');

        return redirect('mahasiswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function update(mahasiswa $mahasiswa, mahasiswaRequest $request) {
        $input = $request->all();

        // Update foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($mahasiswa, $request);
        }

        // Update mahasiswa.
        $mahasiswa->update($input);

        // Update telepon.
        $this->updateTelepon($mahasiswa, $request);

        // Update jurusan.
        $mahasiswa->jurusan()->sync($request->input('jurusan_mahasiswa'));

        // Flash message.
        Session::flash('flash_message', 'Data mahasiswa berhasil diupdate.');

        return redirect('mahasiswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DESTROY / DELETE
    | -------------------------------------------------------------------------------------------------------
    */
    public function destroy(mahasiswa $mahasiswa) {
        // Hapus foto kalau ada.
        $this->hapusFoto($mahasiswa);

        $mahasiswa->delete();

        // Flash message.
        Session::flash('flash_message', 'Data mahasiswa berhasil dihapus.');
        Session::flash('penting', true);

        return redirect('mahasiswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CARI
    | -------------------------------------------------------------------------------------------------------
    */
    public function cari(Request $request) {
        $kata_kunci = trim($request->input('kata_kunci'));

        if (! empty($kata_kunci)) {
            $jenis_kelamin = $request->input('jenis_kelamin');
            $id_semester = $request->input('id_semester');

            // Query
            $query = mahasiswa::where('nama_mahasiswa', 'LIKE', '%' . $kata_kunci . '%');
            (! empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
            (! empty($id_semester)) ? $query->semester($id_semester) : '';

            $mahasiswa_list = $query->paginate(2);

            // URL Links pagination
            $pagination = (! empty($jenis_kelamin)) ? $mahasiswa_list->appends(['jenis_kelamin' => $jenis_kelamin]) : '';
            $pagination = (! empty($id_semester)) ? $pagination = $mahasiswa_list->appends(['id_semester' => $id_semester]) : '';
            $pagination = $mahasiswa_list->appends(['kata_kunci' => $kata_kunci]);

            $jumlah_mahasiswa = $mahasiswa_list->total();
            return view('mahasiswa.index', compact('mahasiswa_list', 'kata_kunci', 'pagination', 'jumlah_mahasiswa', 'id_semester', 'jenis_kelamin'));
        }

        return redirect('mahasiswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | INSERT TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    private function insertTelepon(mahasiswa $mahasiswa, mahasiswaRequest $request) {
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $mahasiswa->telepon()->save($telepon);
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    private function updateTelepon(mahasiswa $mahasiswa, mahasiswaRequest $request) {
        if ($mahasiswa->telepon) {
            // Jika telp diisi, update.
            if ($request->filled('nomor_telepon')) {
                $telepon = $mahasiswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $mahasiswa->telepon()->save($telepon);
            }
            // Jika telp tidak diisi, hapus.
            else {
                $mahasiswa->telepon()->delete();
            }
        }
        // Buat entry baru, jika sebelumnya tidak ada no telp.
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $mahasiswa->telepon()->save($telepon);
            }
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPLOAD FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function uploadFoto(mahasiswaRequest $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function updateFoto(mahasiswa $mahasiswa, mahasiswaRequest $request) {
        // Jika user mengisi foto.
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada foto baru.
            $exist = Storage::disk('foto')->exists($mahasiswa->foto);
            if (isset($mahasiswa->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($mahasiswa->foto);
            }

            // Upload foto baru.
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | HAPUS FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function hapusFoto(mahasiswa $mahasiswa) {
        $is_foto_exist = Storage::disk('foto')->exists($mahasiswa->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($mahasiswa->foto);
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DATE MUTATOR
    | -------------------------------------------------------------------------------------------------------
    */
    public function dateMutator() {
        $mahasiswa = mahasiswa::findOrFail(1);
        $nama = $mahasiswa->nama_mahasiswa;
        $tanggal_lahir = $mahasiswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun = $mahasiswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        return "mahasiswa <strong>{$nama}</strong> lahir pada <strong>{$tanggal_lahir}</strong>.<br>
                Ulang tahun ke-30 akan jatuh pada <strong>{$ulang_tahun}</strong>.";
    }

}