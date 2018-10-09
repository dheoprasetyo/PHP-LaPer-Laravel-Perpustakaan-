<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['npm', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'prodi','jumlah'];


    /**
     * Method One To One 
     */
    // public function user()
    // {
    // 	return $this->belongsTo(User::class);
    // }

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}