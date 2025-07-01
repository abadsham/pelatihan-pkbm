<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'instruktur_id',
        'materi_pembelajaran',
        'jumlah_jam',
        'gambar_bukti',
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
