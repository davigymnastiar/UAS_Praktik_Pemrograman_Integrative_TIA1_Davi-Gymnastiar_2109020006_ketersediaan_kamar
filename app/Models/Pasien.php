<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'umur_pasien',
        'nama_penyakit',
        'kamar_id'
    ]; 

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
