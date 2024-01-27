<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\Alternatif;
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
        $kelompokTani = Petani::all();
        $pestisida = Alternatif::all();
        return view('home', compact('kelompokTani', 'pestisida'));
    }
}
