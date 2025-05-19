<x-filament::page>
    <div class="space-y-4">
        @foreach ($this->notes as $note)
            <div
                class="bg-white dark:bg-gray-800 shadow rounded-xl p-4 border
                    @if($note->prioritas === 'rendah') border-blue-500 dark:shadow-blue-500/50
                    @elseif($note->prioritas === 'sedang') border-green-500 dark:shadow-green-500/50
                    @elseif($note->prioritas === 'tinggi') border-red-500 dark:shadow-red-500/50
                    @else border-gray-300 dark:border-gray-700 @endif"
            >
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $note->judul }}</h2>

                <div class="text-xs">{{ \Carbon\Carbon::parse($note->tanggal_dicatat)->format('d M Y') }}</div>

                <div class="bg-gray-100 dark:bg-gray-900 rounded-md p-3 mt-3 text-gray-800 dark:text-gray-200">
                    {{ $note->catatan }}
                </div>

                <div class="text-sm mt-6 flex flex-wrap gap-x-6 gap-y-1 text-gray-700 dark:text-white">
                    <div><strong>Status:</strong> {{ ucfirst($note->status) }}</div>
                    <div><strong>Prioritas:</strong> {{ ucfirst($note->prioritas) }}</div>
                    <div><strong>Dibuat:</strong> {{ $note->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
