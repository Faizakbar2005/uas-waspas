<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waspas extends Model
{
    use HasFactory;

    // Jika tabel tidak mengikuti konvensi penamaan (plural), atur nama tabel di sini
    protected $table = 'waspas';

    // Jika ada kolom yang bisa diisi massal, tambahkan di sini
    protected $fillable = ['nama', 'qi'];

    // Jika kolom tanggal tidak ada, nonaktifkan ini
    public $timestamps = false;
}
