<div class="bg-white rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex flex-col overflow-hidden">
    <!-- Product Image -->
    <div class="relative bg-gray-100 overflow-hidden">
        <img src="{{ Storage::url($image) }}" 
             alt="{{ $name }}" 
             class="w-full h-40 object-cover transition-transform duration-300 hover:scale-110" />
        
        <!-- Category Badge -->
        <div class="absolute top-2 right-2">
            <span class="px-2 py-0.5 rounded-md font-bold shadow-sm
                {{ isset($category) && $category == 'food' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700' }}" 
                style="font-size: 9px;">
                {{ isset($category) ? strtoupper($category) : 'PRODUCT' }}
            </span>
        </div>
        
        <!-- Stock Badge (if low stock) -->
        @if($stock <= 5)
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
            {{ $name }}
        </h3>

        <!-- Price and Stock Info -->
        <div class="mb-3">
            <div class="flex items-baseline gap-1 mb-1">
                <span class="text-gray-500" style="font-size: 9px;">Price</span>
            </div>
            <p class="text-blue-600 font-bold text-base mb-2">
                Rp{{ number_format($price, 0, ',', '.') }}
            </p>
            
            <!-- Stock Info -->
            <div class="flex items-center justify-between bg-gray-50 rounded-md px-2 py-1 mb-3">
                <span class="text-gray-600" style="font-size: 10px;">Stock Available</span>
                <span class="font-bold {{ $stock <= 5 ? 'text-red-600' : 'text-gray-800' }}" style="font-size: 10px;">
                    {{ $stock }} pcs
                </span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-2 mt-auto">
            <a href="{{ url('/edit_product/'.$editUrl) }}" 
               class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 rounded-md transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center gap-1"
               style="font-size: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span>Edit</span>
            </a>
            
            <a href="{{ url('/delete_product/'.$deleteUrl) }}" 
               class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-2 rounded-md transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center gap-1"
               style="font-size: 10px;"
               onclick="return confirm('Are you sure you want to delete this product?')">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                <span>Delete</span>
            </a>
        </div>
    </div>
</div>

<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>