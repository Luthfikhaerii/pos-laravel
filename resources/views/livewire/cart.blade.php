<div class="bg-white shadow-2xl w-72 h-screen fixed right-0 flex flex-col border-l border-gray-200">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-4 shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h2 class="text-lg font-bold text-gray-700">Order</h2>
            </div>
            <div class="bg-white/20 backdrop-blur-sm px-2.5 py-1 rounded-full">
                <span class="text-gray-700 text-xs font-bold">{{ count($cart) }} items</span>
            </div>
        </div>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-3 space-y-3 custom-scrollbar bg-gray-50">
        @if(count($cart) > 0)
            @foreach ($cart as $item)
            <div class="bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition-all duration-200">
                <!-- Product Info -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex-1 min-w-0 pr-2">
                        <p class="font-bold text-sm text-gray-800 mb-1">
                            {{$item['name_product']}}
                        </p>
                        <span class="inline-block text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-md font-medium mb-2">
                            {{$item['category']}}
                        </span>
                        <p class="text-blue-600 text-base font-bold">
                            Rp{{number_format($item['price'], 0, ',', '.')}}
                        </p>
                    </div>

                    <!-- Remove Button -->
                    <button wire:click="remove({{ $item['id'] }})" 
                        class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-all flex-shrink-0"
                        title="Remove item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>

                <!-- Quantity & Subtotal Section -->
                <div class="space-y-2 pt-3 border-t border-gray-100">
                    <!-- Quantity Controls -->
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-600 font-semibold">Quantity</span>
                        <div class="flex items-center space-x-2 bg-gray-50 border border-gray-200 rounded-lg p-1">
                            <button wire:click="decrement({{ $item['id'] }})"
                                class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-white text-gray-700 hover:text-gray-900 transition-colors font-bold border border-gray-200">
                                −
                            </button>
                            <span class="w-8 text-center font-bold text-gray-800">{{$item['amount']}}</span>
                            <button wire:click="increment({{ $item['id'] }})" 
                                class="w-8 h-8 flex items-center justify-center rounded-md bg-blue-600 text-white hover:bg-blue-700 transition-colors font-bold">
                                +
                            </button>
                        </div>
                    </div>

                    <!-- Subtotal -->
                    <div class="flex justify-between items-center bg-blue-50 rounded-lg p-2">
                        <span class="text-xs text-gray-700 font-semibold">Subtotal</span>
                        <span class="text-sm font-bold text-blue-600">
                            Rp{{number_format($item['price'] * $item['amount'], 0, ',', '.')}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <!-- Empty Order State -->
            <div class="flex flex-col items-center justify-center h-full text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <p class="text-gray-600 font-semibold text-sm">No Orders Yet</p>
                <p class="text-gray-400 text-xs mt-1">Select items to create an order</p>
            </div>
        @endif
    </div>

    <!-- Summary & Checkout -->
    <div class="border-t border-gray-200 bg-white p-4 shadow-2xl">
        <!-- Summary -->
        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-3 mb-3 border border-gray-200">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-700 font-semibold">Total Items</span>
                <span class="font-bold text-gray-800">{{ $amount_item }}</span>
            </div>
            <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                <span class="text-base text-gray-800 font-bold">Total Price</span>
                <span class="text-xl font-bold text-blue-600">
                    Rp{{ number_format($total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- Checkout Button -->
        <button wire:click="createTransaction"
            class="w-full bg-blue-600 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
            {{ count($cart) == 0 ? 'disabled' : '' }}>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Create Transaction</span>
        </button>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>