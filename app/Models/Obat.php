<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $fillable = ['nama', 'harga', 'stok'];

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class);
    }
}
