<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kamar',
        'nomor_kamar',
        'level_kamar'
    ];

    public function pasien()
    {
        return $this->hasOne(Pasien::class);
    }
}
