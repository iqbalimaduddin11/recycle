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
    public function storeNasabah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'alamat' => 'required|string',
            'rekening' => 'required|integer',
            'nomer' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Nasabah::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'rekening' => $request->rekening,
            'nomer' => $request->nomer,
        ]);
        return redirect('/nasabah')->with('status', 'nasabah has created');

    }
    public function editNasabah()
    {
        return view('nasabah.edit');
    // }
    // public function updateNasabah()
    // {

    // }
}
