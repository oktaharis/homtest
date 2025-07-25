<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';
    protected $fillable = ['nama', 'biaya'];

    public function transaksiTindakan()
    {
        return $this->hasMany(TransaksiTindakan::class);
    }
}
