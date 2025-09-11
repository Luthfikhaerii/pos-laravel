<div class="bg-white shadow-sm w-80 h-screen fixed right-0 rounded-sm flex flex-col justify-between">
    <div class="p-4 mx-2 h-20 flex items-center">
        <h2 class="text-2xl mt-8 font-bold text-gray-600 text-center">Transaction</h2>
    </div>

    <div class="flex-1 overflow-y-auto p-4 space-y-3">
        @if(isset($detail)) 
        @foreach ($detail['transaction_item'] as $item)
        <div class="flex items-center justify-between border-b border-gray-200 px-2 pb-3">
            <div class="w-28">
                <p class="font-semibold text-sm text-gray-800 line-clamp-2">{{$item['name_product']}}</p>
                {{-- <p class="text-xs text-gray-500 truncate">{{$item['category']}}</p> --}}
                <p class="text-blue-500 text-xs font-semibold">Rp{{$item['price']}}</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="w-6 text-sm text-center font-medium">{{$item['amount']}}</span>
            </div>
        </div>
        @endforeach
    @endif
</div>

<!-- Ringkasan & Tombol -->
<div class="border-t border-gray-300 p-4 bg-gray-50">
    <div class="flex justify-between text-sm mb-2">
        <span>Total Item:</span>
        <span>{{ $amount_item }}</span>
    </div>
    <div class="flex justify-between font-semibold mb-4">
        <span>Total Price:</span>
        <span>Rp{{ number_format($total_price) }}</span>
    </div>
    <div class="mb-4 mt-4">
    <select wire:change="updateStatus({{ $detail['id'] }},$event.target.value)'" id="status"
        class="block w-64 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-base font-semibold" {{ !isset($status)?'readonly':'' }}>
        <option value="" {{ $status==""?"selected":"" }} class="text-green-600 font-bold">Select Order</option>
        <option value="NEW ORDER" {{ $status=="NEW ORDER"?"selected":"" }} class="text-green-600 font-bold">🟢 New Order</option>
        <option value="ON COOK" {{ $status=="ON COOK"?"selected":"" }} class="text-yellow-600 font-bold">🟡 On Cook</option>
        <option value="DONE" {{ $status=="DONE"?"selected":"" }} class="text-blue-600 font-bold">🔵 Done</option>
        <option value="CANCELED" {{ $status=="CANCELED"?"selected":"" }} class="text-red-600 font-bold">🔴 Canceled</option>
    </select>
</div>
</div>
</div>
