@php
    if (!function_exists('formatRupiah2')) {
        function formatRupiah2($angka) {
            return number_format($angka, 0, ',', '.');
        }
    }
@endphp


<div class="w-full mt-6 px-4 sm:px-4 lg:px-4">
    <div class="flex flex-wrap gap-4 justify-evenly">
        @foreach ($data as $item)
            <div class="bg-white rounded-2xl m-4  shadow-md" style="width: 256px;">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-white text-xs font-medium opacity-90 mb-1">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </p>
                            <p class="text-white text-lg font-bold">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                            </p>
                        </div>
                        <span class="px-3 py-1.5 rounded-full text-xs font-bold shadow-sm
                            {{ $item->status === 'done' ? 'bg-green-100 text-green-700' : 
                               ($item->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                               'bg-red-100 text-red-700') }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- Order ID -->
                    <div class="mb-3">
                        <p class="text-xs text-gray-500 mb-1">Order ID</p>
                        <p class="text-sm font-semibold text-gray-800">#{{ str_pad($item->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <!-- Items List -->
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-600 mb-2 uppercase tracking-wide">Items Ordered</p>
                        <div class="space-y-2  overflow-y-auto custom-scrollbar">
                            @foreach ($item->transaction_item as $t_item)
                                <div class="flex items-start gap-2 py-2 px-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <span class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">
                                        {{ $t_item['amount'] }}
                                    </span>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-gray-700 line-clamp-2 leading-tight">
                                            {{ $t_item['name_product'] }}
                                        </p>
                                        <p class="text-xs font-semibold text-gray-800 mt-0.5">
                                            Rp{{ formatRupiah2($t_item['price']) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-3 mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-gray-600 font-medium">Total Items</span>
                            <span class="text-sm font-bold text-gray-800">{{ $item->amount_item }} items</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-700 font-semibold">Total Harga</span>
                            <span class="text-lg font-bold text-blue-600">
                                Rp{{ formatRupiah2($item->total_price) }}
                            </span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <button  
                        wire:click="addDetail(
                            {{ $item->id }},
                            '{{ json_encode($item->transaction_item) }}',
                            {{ $item->total_price }},
                            {{ $item->amount_item }},
                            '{{ $item->created_at }}',
                            '{{ $item->status }}'
                        )"
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm font-semibold py-3 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                        <span>Lihat Detail</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="w-full flex justify-center mt-8 mb-6">
        {{ $data->links() }}
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>