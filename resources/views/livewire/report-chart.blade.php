<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Laporan Penjualan</h2>

    {{-- Filter tanggal --}}
    <div class="flex gap-4 mb-6">
        <div>
            <label class="block text-sm font-medium">Dari</label>
            <input type="date" wire:model="startDate" class="border rounded p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Sampai</label>
            <input type="date" wire:model="endDate" class="border rounded p-2">
        </div>
    </div>

    {{-- Kotak angka --}}
    <div class="grid grid-cols-3 gap-6 mb-6">
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

    {{-- Grafik omzet bulanan --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Omzet Bulanan</h3>
        <canvas id="monthlyChart" height="120"></canvas>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('livewire:load', () => {
            let ctx = document.getElementById('monthlyChart').getContext('2d');
            let chart;

            Livewire.on('refreshChart', (data) => {
                if(chart) chart.destroy();
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(data),
                        datasets: [{
                            label: 'Omzet',
                            data: Object.values(data),
                            backgroundColor: 'rgba(54, 162, 235, 0.7)'
                        }]
                    }
                });
            });

            // trigger awal
            Livewire.emit('refreshChart', @json($monthlyRevenue));
        });
    </script>
    @endpush
</div>

