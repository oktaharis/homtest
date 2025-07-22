<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $fillable = ['pasien_id', 'user_id', 'tanggal_kunjungan', 'jenis_kunjungan', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksiTindakan()
    {
        return $this->hasMany(TransaksiTindakan::class);
    }

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
