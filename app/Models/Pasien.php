<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $fillable = ['nama', 'alamat', 'wilayah_id', 'tanggal_lahir'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
