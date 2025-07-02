<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-4">Rincian Anggaran Biaya</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Nama Kegiatan</th>
                    <th class="text-left py-2">Keterangan</th>
                    <th class="text-right py-2">Jumlah (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getRabs() as $rab)
                    <tr class="border-b">
                        <td class="py-2">{{ $rab->nama_kegiatan }}</td>
                        <td class="py-2">{{ $rab->keterangan }}</td>
                        <td class="py-2 text-right">{{ number_format($rab->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::section>
</x-filament-widgets::widget>
