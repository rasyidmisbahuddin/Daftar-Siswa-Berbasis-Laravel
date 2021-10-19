<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class mahasiswakuAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';

        if (request()->segment(1) == 'mahasiswa') {
            $halaman = 'mahasiswa';
        }

        if (request()->segment(1) == 'about') {
            $halaman = 'about';
        }

        if (request()->segment(1) == 'semester') {
            $halaman = 'semester';
        }

        if (request()->segment(1) == 'jurusan') {
            $halaman = 'jurusan';
        }

        if (request()->segment(1) == 'user') {
            $halaman = 'user';
        }

        view()->share('halaman', $halaman);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
