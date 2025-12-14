@php
    if (!function_exists('formatRupiah2')) {
        function formatRupiah2($angka) {
            return number_format($angka, 0, ',', '.');
        }
    }
@endphp

<div class="w-full mt-4 px-6 pr-72">
    <!-- Grid Layout for Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($data as $item)
            <div class="bg-white rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-2 rounded-t-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-white text-xs font-medium opacity-90">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </p>
                            <p class="text-white text-xs font-bold">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                            </p>
                        </div>
                        <span class="px-2 py-0.5 rounded-md text-xs font-bold shadow-sm
                            {{ $item->status === 'done' ? 'bg-green-100 text-green-700' : 
                               ($item->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                               'bg-red-100 text-red-700') }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-2">
                    <!-- Order ID -->
                    <div class="mb-1.5">
                        <p class="text-gray-500" style="font-size: 10px;">Order ID</p>
                        <p class="font-bold text-gray-800" style="font-size: 11px;">#{{ str_pad($item->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <!-- Items List -->
                    <div class="mb-2">
                        <p class="font-semibold text-gray-600 mb-1 uppercase tracking-wide" style="font-size: 10px;">Items</p>
                        <div class="space-y-1 max-h-24 overflow-y-auto custom-scrollbar">
                            @foreach ($item->transaction_item as $t_item)
                                <div class="flex items-start gap-1 py-0.5 px-1.5 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                                    <span class="flex-shrink-0 w-4 h-4 bg-blue-500 text-white rounded-full flex items-center justify-center" style="font-size: 9px; font-weight: bold;">
                                        {{ $t_item['amount'] }}
                                    </span>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-gray-700 line-clamp-1 leading-tight font-medium" style="font-size: 10px;">
                                            {{ $t_item['name_product'] }}
                                        </p>
                                        <p class="font-semibold text-gray-800" style="font-size: 10px;">
                                            Rp{{ formatRupiah2($t_item['price']) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-md p-1.5 mb-2">
                        <div class="flex justify-between items-center mb-0.5">
                            <span class="text-gray-600" style="font-size: 10px;">Total Items</span>
                            <span class="font-bold text-gray-800" style="font-size: 10px;">{{ $item->amount_item }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-semibold" style="font-size: 10px;">Total</span>
                            <span class="text-xs font-bold text-blue-600">
                                Rp{{ formatRupiah2($item->total_price) }}
                            </span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <button  
                        wire:click="addDetail(
                            {{ $item->id }},
                            {{ json_encode(json_encode($item->transaction_item)) }},
                            {{ $item->total_price }},
                            {{ $item->amount_item }},
                            '{{ $item->created_at }}',
                            '{{ $item->status }}'
                        )"
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-1.5 rounded-md transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center gap-1" style="font-size: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Details</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="w-full flex justify-center mt-6 mb-4">
        {{ $data->links() }}
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 3px;
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
    
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>