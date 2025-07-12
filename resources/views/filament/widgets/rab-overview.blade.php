<x-filament-widgets::widget>
    <x-filament::card>
        <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="space-y-2">
                <label class="font-medium text-sm text-gray-700">Nama Kegiatan <span class="text-red-500">*</span></label>
                <input type="text" wire:model.defer="nama_kegiatan" required
                    class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-1 focus:ring-primary-500" />
            </div>

            <div class="space-y-2 md:col-span-1">
                <label class="font-medium text-sm text-gray-700">Keterangan</label>
                <input type="text" wire:model.defer="keterangan"
                    class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-1 focus:ring-primary-500" />
            </div>

            <div class="space-y-2">
                <label class="font-medium text-sm text-gray-700">Jumlah (Rp) <span class="text-red-500">*</span></label>
                <input type="number" wire:model.defer="jumlah" min="0" required
                    class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-1 focus:ring-primary-500" />
            </div>
            <div class="space-y-2"></div>
            <div class="space-y-2"></div>
            <div class="space-y-2 mb-5">
                <x-filament::button type="submit"
                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg shadow transition">
                    + Tambah RAB
                </x-filament::button>
                @if (session()->has('success'))
                    <span class="text-red-500 text-sm">{{ session('success') }}</span>
                @endif
            </div>
        </form>


        <hr class="my-6" />

        <h3 class="font-bold text-lg mb-2">Daftar RAB</h3>
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-2"></th>
                    <th class="text-left p-2">Nama Kegiatan</th>
                    <th class="text-left p-2">Keterangan</th>
                    <th class="text-right p-2">Jumlah (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getRabs() as $index => $rab)
                    <tr class="border-t">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $rab->nama_kegiatan }}</td>
                        <td class="p-2">{{ $rab->keterangan ?? '-' }}</td>
                        <td class="p-2 text-right">{{ number_format($rab->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::card>

</x-filament-widgets::widget>
