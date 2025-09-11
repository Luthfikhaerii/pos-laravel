<div class="bg-white shadow-sm w-80 h-screen fixed right-0 rounded-sm flex flex-col justify-between">
    <div class="p-4 mx-2 h-20 flex items-center">
        <h2 class="text-2xl mt-8 font-bold text-gray-600 text-center">Transaction</h2>
    </div>

    <div class="flex-1 overflow-y-auto p-4 space-y-3">
        @foreach ($cart as $item)
        <div class="flex items-center justify-between border-b border-gray-200 px-2 pb-3">
            <div class="w-20">
                <p class="font-semibold text-sm text-gray-800 line-clamp-2">{{$item['name_product']}}</p>
                <p class="text-xs text-gray-500 truncate">{{$item['category']}}</p>
                <p class="text-blue-500 text-xs font-semibold">Rp{{$item['price']}}</p>
            </div>

            <div class="flex items-center space-x-2">
                <button wire:click="decrement({{ $item['id'] }})"
                    class="w-7 h-7 flex items-center justify-center rounded-md border border-gray-300 hover:bg-gray-200">
                    –
                </button>
                <span class="w-6 text-sm text-center font-medium">{{$item['amount']}}</span>
                <button wire:click="increment({{ $item['id'] }})" 
                    class="w-7 h-7 flex items-center justify-center rounded-md bg-blue-600 text-white hover:bg-blue-500">
                    +
                </button>
            </div>
            <button wire:click="remove({{ $item['id'] }})" 
            class="ml-2 text-red-500 hover:text-red-700 text-sm font-medium">
            Remove
           </button>
        </div>
    @endforeach
</div>

<!-- Ringkasan & Tombol -->
<div class="border-t border-gray-300 p-4 bg-gray-50">
    <div class="flex justify-between text-sm mb-2">
        <span>Total Barang:</span>
        <span>{{ $amount_item }}</span>
    </div>
    <div class="flex justify-between font-semibold mb-4">
        <span>Total Harga:</span>
        <span>Rp{{ number_format($total_price) }}</span>
    </div>
    <button wire:click="createTransaction"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
        Create Transaction
    </button>
</div>
</div>
