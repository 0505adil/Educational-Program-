<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZavkafController extends Controller
{
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
        return view('zavkaf/zavkaf');
    }

    public function iup(){
        return view('zavkaf/iup');
    }

    public function pps(){
        return view('zavkaf/pps');
    }

    public function news(){
        return view('zavkaf/news');
    }

}
