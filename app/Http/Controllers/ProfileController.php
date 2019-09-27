<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    /**
     * Halaman awal web
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * halaman portofolio
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function portfolio()
    {
        return view('profile.portfolio');
    }

}
