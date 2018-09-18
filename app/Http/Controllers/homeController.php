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
    	$transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        // if(Auth::user()->level == 'user')
        // {
        //     $datas = Transaksi::where('status', 'pinjam')
        //                         ->where('anggota_id', Auth::user()->anggota->id)
        //                         ->get();
        // } else {
            $datas = Transaksi::where('status', 'pinjam')->get();
        // }
        return view('home', compact('transaksi', 'anggota', 'buku', 'datas'));
    }

}
