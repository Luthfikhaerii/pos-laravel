@php
    function formatRupiah($angka) {
        return number_format($angka, 0, ',', '.');
    }
@endphp

<div class="space-y-6">
    <!-- Date Filter Section -->
    <div class="bg-white rounded-sm shadow-sm border border-black/5 p-6">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <h3 class="text-sm font-semibold text-gray-700">Filter by Date</h3>
            </div>
            
            <div class="flex gap-3 ml-4">
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-xs font-medium text-gray-600 mb-1">Start Date</label>
                    <input type="date" 
                           wire:model="start_date" 
                           id="start_date"
                           class="px-3 py-2 border border-gray-300 rounded-sm text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>
                
                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-xs font-medium text-gray-600 mb-1">End Date</label>
                    <input type="date" 
                           wire:model="end_date" 
                           id="end_date"
                           class="px-3 py-2 border border-gray-300 rounded-sm text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-black/5 overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <div class="grid grid-cols-12 gap-4 px-6 py-4 items-center">
                <div class="col-span-1">
                    <p class="text-xs font-bold text-gray-700 text-center">No</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-bold text-gray-700 text-center">Date</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-bold text-gray-700 text-center">Time</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-bold text-gray-700 text-center">Items</p>
                </div>
                <div class="col-span-3">
                    <p class="text-xs font-bold text-gray-700 text-center">Total Price</p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs font-bold text-gray-700 text-center">Action</p>
                </div>
            </div>
        </div>

        <!-- Table Body -->
        <div class="divide-y divide-gray-200">
            @forelse ($data as $i => $item)
                <div class="grid grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-blue-50 transition-colors">
                    <!-- Number -->
                    <div class="col-span-1">
                        <p class="text-sm text-gray-800 text-center font-semibold">{{ $i + 1 }}</p>
                    </div>
                    
                    <!-- Date -->
                    <div class="col-span-2">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm text-gray-800">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                        </div>
                    </div>
                    
                    <!-- Time -->
                    <div class="col-span-2">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-gray-800">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}</p>
                        </div>
                    </div>
                    
                    <!-- Amount Items -->
                    <div class="col-span-2">
                        <div class="flex items-center justify-center">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">
                                {{ $item->amount_item }} items
                            </span>
                        </div>
                    </div>
                    
                    <!-- Total Price -->
                    <div class="col-span-3">
                        <p class="text-sm font-bold text-blue-600 text-center">Rp{{ formatRupiah($item->total_price) }}</p>
                    </div>
                    
                    <!-- Action Button -->
                    <div class="col-span-2 flex justify-center">
                        <a href="{{ route('history_detail.index',['id'=>$item->id]) }}" 
                           class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-xs font-semibold rounded-sm transition-all duration-200 shadow-sm border border-black/5 hover:shadow-lg transform hover:scale-[1.02] flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Detail</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 font-medium">No order history found</p>
                    <p class="text-gray-400 text-sm mt-1">Try adjusting your date filter</p>
                </div>
            @endforelse
        </div>
    </div>
</div>