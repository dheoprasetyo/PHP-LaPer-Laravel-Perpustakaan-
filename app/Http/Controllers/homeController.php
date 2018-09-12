<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Anggota;
use App\Buku;
use Auth;


class homeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
    	return view('home');
    }

}
