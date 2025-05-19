<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold mb-4">Aktivitas Terbaru</h2>

        <ul class="space-y-2">
            @foreach ($transaksis as $transaksi)
                <li class="border-b pb-2">
                    <div class="text-sm">
                        <span class="font-semibold">{{ $transaksi->kategori->nama ?? 'Tanpa Kategori' }}</span>
                        - {{ $transaksi->nama ?? '-' }}
                    </div>
                     <div class="text-xs text-gray-600">
                        {{ $transaksi->catatan }}
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ $transaksi->created_at->format('d M Y, H:i') }}
                    </div>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
