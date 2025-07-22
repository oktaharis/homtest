<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['kunjungan_id', 'total_biaya', 'status', 'tanggal_bayar'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
