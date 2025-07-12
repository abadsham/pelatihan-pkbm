<?php

namespace App\Filament\Widgets;

use App\Models\Rab;
use Filament\Widgets\Widget;

class RabOverview extends Widget
{
    protected static string $view = 'filament.widgets.rab-overview';
    protected int | string | array $columnSpan = 'full';
    public $nama_kegiatan;
    public $keterangan;
    public $jumlah;

    public function submit()
    {
        $this->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        Rab::create([
            'nama_kegiatan' => $this->nama_kegiatan,
            'keterangan' => $this->keterangan,
            'jumlah' => $this->jumlah,
        ]);

        $this->reset(['nama_kegiatan', 'keterangan', 'jumlah']);
        session()->flash('success', 'Item RAB berhasil ditambahkan.');
    }

    public function getRabs()
    {
        return Rab::latest()->paginate(15);
    }

    
}
