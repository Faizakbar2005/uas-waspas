<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'nama',
        'bobot'
        ];
    
    public function produk(){
        return $this->hasMany(produk::class, 'kriteria_id', 'id');
    }
}
