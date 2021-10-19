<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\semesterRequest;
use App\semester;
use Session;

class semesterController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $semester_list = semester::all();
        return view('semester/index', compact('semester_list'));
    }

    public function create() {
        return view('semester.create');
    }

    public function store(semesterRequest $request) {
        semester::create($request->all());
        Session::flash('flash_message', 'Data semester berhasil disimpan.');
        return redirect('semester');
    }

    public function edit(semester $semester) {
        return view('semester.edit', compact('semester'));
    }

    public function update(semester $semester, semesterRequest $request) {
        $semester->update($request->all());
        Session::flash('flash_message', 'Data semester berhasil diupdate.');
        return redirect('semester');
    }

    public function destroy(semester $semester) {
        $semester->delete();
        Session::flash('flash_message', 'Data semester berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('semester');
    }
}
