<x-filament::widget>
    <x-filament::card>
        <h4 class="text-base font-semibold mb-1">Note Terdekat</h4>

        @if ($closestNote)
            <div class="flex items-center justify-between text-sm">
                <h3 class="text-gray-800 dark:text-gray-100">
                    {{ $closestNote->judul }}
                </h3>
                <div class="text-xs text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                    <x-heroicon-o-calendar class="w-4 h-4 text-orange-500" />
                    <span>
                        {{ \Carbon\Carbon::parse($closestNote->tanggal_dicatat)->format(' d M Y') }}
                    </span>
                </div>
            </div>
        @else
            <div class="text-sm text-gray-500">Tidak ada catatan terdekat.</div>
        @endif
    </x-filament::card>
</x-filament::widget>
