<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiTindakan extends Model
{
    protected $table = 'transaksi_tindakan';
    protected $fillable = ['kunjungan_id', 'tindakan_id', 'jumlah', 'catatan'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
