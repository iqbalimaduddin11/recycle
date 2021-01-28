<?php

namespace App\Http\Controllers;
use App\Nasabah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    // controller nasabah
    public function getNasabah()
    {
        $nasabah = Nasabah::get();
        return view('nasabah.index', compact('nasabah'));
    }

    public function createNasabah()
    {
        return view('nasabah.create');
    }
}
