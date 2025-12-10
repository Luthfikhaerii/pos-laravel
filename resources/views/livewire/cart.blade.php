<div class="bg-white shadow-lg w-60 h-[90vh] fixed right-3 top-6 flex flex-col border border-gray-200 rounded-lg">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-3 shadow-lg rounded-t-lg">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-bold text-white">Order</h2>
            <span class="text-xs bg-white/20 backdrop-blur px-2 py-0.5 rounded-sm text-white font-semibold">
                {{ count($cart) }} items
            </span>
        </div>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-2 space-y-2 custom-scrollbar bg-gray-50">
        @if(count($cart) > 0)
            @foreach ($cart as $item)
            <div class="bg-white border border-gray-200 rounded-md p-2 hover:shadow transition">

                <!-- Product Info -->
                <div class="flex items-start justify-between mb-2">
                    <div class="flex-1 min-w-0 pr-1">
                        <p class="font-semibold text-xs text-gray-800">
                            {{ $item['name_product'] }}
                        </p>

                        <span class="inline-block text-[10px] text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded-sm">
                            {{ $item['category'] }}
                        </span>

                        <p class="text-blue-600 text-sm font-bold mt-1">
                            Rp{{ number_format($item['price']) }}
                        </p>
                    </div>

                    <button wire:click="remove({{ $item['id'] }})"
                        class="text-gray-400 hover:text-red-500 p-1 rounded-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>

                <!-- Quantity & Subtotal -->
                <div class="space-y-1 pt-2 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] text-gray-600 font-semibold">Qty</span>

                        <div class="flex items-center space-x-1 bg-gray-50 border border-gray-200 rounded p-1">
                            <button wire:click="decrement({{ $item['id'] }})"
                                class="w-6 h-6 flex items-center justify-center text-sm font-bold border border-gray-200 rounded hover:bg-white">
                                −
                            </button>

                            <span class="w-6 text-center text-xs font-bold">
                                {{ $item['amount'] }}
                            </span>

                            <button wire:click="increment({{ $item['id'] }})"
                                class="w-6 h-6 flex items-center justify-center text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-between items-center bg-blue-50 rounded p-1">
                        <span class="text-[10px] font-semibold text-gray-700">Subtotal</span>
                        <span class="text-xs font-bold text-blue-600">
                            Rp{{ number_format($item['price'] * $item['amount']) }}
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
        @else
            <div class="flex flex-col items-center justify-center py-10 text-center">
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <p class="text-gray-600 text-xs font-semibold mt-2">No Orders Yet</p>
            </div>
        @endif
    </div>

    <!-- Summary -->
    <div class="border-t border-gray-200 bg-white p-3 rounded-b-lg">
        <div class="bg-blue-50 rounded-md p-2 mb-2 border border-gray-200">
            <div class="flex justify-between text-xs mb-1">
                <span class="text-gray-700">Total Items</span>
                <span class="font-bold">{{ $amount_item }}</span>
            </div>

            <div class="flex justify-between border-t border-gray-200 pt-1 items-center">
                <span class="font-bold text-gray-800 text-xs">Total Price</span>
                <span class="text-blue-600 font-bold text-base">
                    Rp{{ number_format($total_price) }}
                </span>
            </div>
        </div>

        <button wire:click="createTransaction"
            class="w-full bg-blue-600 text-white text-sm font-bold py-2 rounded-md shadow hover:bg-blue-700 transition disabled:opacity-40"
            {{ count($cart) == 0 ? 'disabled' : '' }}>
            Create Transaction
        </button>
    </div>

</div>
