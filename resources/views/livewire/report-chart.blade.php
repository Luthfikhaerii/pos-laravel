<div class="py-6 flex items-end">
    {{-- Filter tanggal --}}
    <div class="flex items-center p-2 justify-between pr-4">
        <div class="flex mb-4 bg-white shadow-sm rounded-lg">
            <div class="px-4 py-2 ">
                <label for="start_date" class="block text-sm font-medium text-gray-700 ">Start Date</label>
                <input type="date" wire:model="start_date" id="start_date"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="px-4 py-2 ml-2">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" wire:model="end_date" id="end_date"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </div>
    </div>

    {{-- Kotak angka --}}
    <div class="grid grid-cols-3 gap-6 mb-6 w-full">
        <div class="bg-blue-100 p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-600">Jumlah Transaksi</p>
            <p class="text-2xl font-bold">{{ $totalTransactions }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-600">Omset</p>
            <p class="text-2xl font-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-600">Item Terjual</p>
            <p class="text-2xl font-bold">{{ $totalItems }}</p>
        </div>
    </div>
</div>

