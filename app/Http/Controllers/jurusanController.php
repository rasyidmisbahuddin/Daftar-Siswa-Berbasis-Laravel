<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\jurusanRequest;
use App\jurusan;
use Session;

class jurusanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $jurusan_list = jurusan::all();
        return view('jurusan.index', compact('jurusan_list'));
    }

    public function create() {
        return view('jurusan.create');
    }

    public function store(jurusanRequest $request) {
        jurusan::create($request->all());
        Session::flash('flash_message', 'Data jurusan berhasil disimpan.');
        return redirect('jurusan');
    }

    public function edit(jurusan $jurusan) {
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(jurusan $jurusan, jurusanRequest $request) {
        $jurusan->update($request->all());
        Session::flash('flash_message', 'Data jurusan berhasil diupdate.');
        return redirect('jurusan');
    }

    public function destroy(jurusan $jurusan) {
        $jurusan->delete();
        Session::flash('flash_message', 'Data jurusan berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('jurusan');
    }
}
