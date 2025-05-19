<x-filament::page>
    <form wire:submit.prevent="generatePdf" class="space-y-6 max-w-sm">

        <div>
            <label for="bulan" class="block text-sm font-medium text-gray-700 dark:text-white">Bulan</label>
            <select
                id="bulan"
                wire:model.defer="bulan"
                required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-900 dark:text-white dark:border-gray-700"
            >
                <option value=""> Pilih Bulan </option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>

        <div>
            <label for="tahun" class="block text-sm font-medium text-gray-700 dark:text-white">Tahun</label>
            <select
                id="tahun"
                wire:model.defer="tahun"
                required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-900 dark:text-white dark:border-gray-700"
            >
                <option value=""> Pilih Tahun </option>
                @php
                    $startYear = 2010;
                    $currentYear = now()->year;
                @endphp
                @for ($year = $startYear; $year <= $currentYear; $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>

        <div class="flex gap-x-4">
            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:text-white"
            >
                Download PDF 
            </button>
        </div>

    </form>
</x-filament::page>
