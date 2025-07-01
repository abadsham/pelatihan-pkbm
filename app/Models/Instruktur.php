<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pendidikan_terakhir',
        'alamat',
        'no_hp',
    ];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }
}
