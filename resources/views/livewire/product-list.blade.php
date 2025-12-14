@php
    function formatRupiah($angka) {
        return number_format($angka, 0, ',', '.');
    }
@endphp

<div class="w-full p-6 pr-56">
    <!-- Grid Layout for Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-5">
        @foreach ($data as $item)
            <div class="bg-white rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex flex-col overflow-hidden">
                <!-- Product Image -->
                <div class="relative bg-gray-100 overflow-hidden">
                    <img src="{{ asset('/storage/' . $item->image) }}" 
                         alt="{{ $item->name_product }}" 
                         class="w-full h-40 object-cover transition-transform duration-300 hover:scale-110" />

                    <!-- Category Badge -->
                    <div class="absolute top-2 right-2">
                        <span class="px-2 py-0.5 rounded-md font-bold shadow-sm
                            {{ $item->category == 'food' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700' }}" 
                            style="font-size: 9px;">
                            {{ strtoupper($item->category) }}
                        </span>
                    </div>

                    <!-- Stock Badge (if low stock) -->
                    @if($item->stock <= 5)
                        <div class="absolute top-2 left-2">
                            <span class="px-2 py-0.5 rounded-md font-bold shadow-sm bg-red-100 text-red-700" style="font-size: 9px;">
                                LOW STOCK
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-3 flex-1 flex flex-col">
                    <!-- Product Name -->
                    <h3 class="font-bold text-gray-800 mb-2 line-clamp-1" style="font-size: 13px;">
                        {{ $item->name_product }}
                    </h3>

                    <!-- Price and Stock Info -->
                    <div class="mb-3 mt-auto">
                        <div class="flex items-baseline gap-1 mb-1">
                            <span class="text-gray-500" style="font-size: 9px;">Price</span>
                        </div>
                        <p class="text-blue-600 font-bold text-base mb-2">
                            Rp{{ formatRupiah($item->price) }}
                        </p>
                        
                        <!-- Stock Info -->
                        <div class="flex items-center justify-between bg-gray-50 rounded-md px-2 py-1">
                            <span class="text-gray-600" style="font-size: 10px;">Stock Available</span>
                            <span class="font-bold" style="font-size: 10px;"
                                  :class="{{ $item->stock <= 5 ? 'text-red-600' : 'text-gray-800' }}">
                                {{ $item->stock }} pcs
                            </span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <button  
                        wire:click="add({{ $item->id }},'{{ $item->name_product }}',{{ $item->price }},{{ $item->stock }},'{{ $item->category }}')" 
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 rounded-md transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center gap-1.5
                               {{ $item->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                        {{ $item->stock <= 0 ? 'disabled' : '' }}
                        style="font-size: 11px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>{{ $item->stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>