@php 
    function formatRupiah($angka) {
        return number_format($angka, 0, ',', '.');
    }
@endphp

<div class="bg-white shadow-xl w-72 h-[90vh] fixed right-3 top-6 flex flex-col border border-gray-200 rounded-md">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-3 shadow-md rounded-t-md">
        <div class="flex items-center justify-between">
            <h2 class="text-sm font-bold text-white">Transaction Details</h2>

            <span class="text-[10px] bg-white/20 backdrop-blur px-2 py-0.5 rounded-sm 
                        text-white font-semibold">
                {{ isset($detail) ? count($detail['transaction_item']) : 0 }} items
            </span>
        </div>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-3 space-y-3 custom-scrollbar bg-gray-50">

        <!-- Order Info -->
        @if(isset($detail))
        <div class="bg-white border border-gray-200 rounded-md p-3 text-xs text-gray-700 space-y-2">

            <div class="flex justify-between">
                <span class="font-semibold text-gray-800">Customer</span>
                <span class="font-bold">Walk-in</span>
            </div>

            <div class="flex justify-between">
                <span>Order ID</span>
                <span class="font-semibold text-gray-800">#POS{{ $detail['id'] }}</span>
            </div>

            <div class="flex justify-between">
                <span>Date</span>
                <span class="font-semibold text-gray-800">{{ date('d M Y') }}</span>
            </div>

            <div class="flex justify-between">
                <span>Time</span>
                <span class="font-semibold text-gray-800">{{ date('H:i') }}</span>
            </div>

        </div>

        <!-- Item List -->
        <div class="space-y-3">
            @foreach ($detail['transaction_item'] as $item)
            <div class="bg-white border border-gray-200 rounded-md p-3 text-xs flex justify-between items-start">

                <div class="w-32">
                    <p class="font-semibold text-gray-800 text-sm line-clamp-2">
                        {{ $item['name_product'] }}
                    </p>

                    <p class="text-blue-600 font-bold text-xs mt-1">
                        Rp{{ formatRupiah($item['price']) }}
                    </p>
                </div>

                <div class="flex items-center bg-blue-50 rounded px-2 py-1 border border-blue-100">
                    <span class="text-xs font-bold text-blue-700">
                        Qty: {{ $item['amount'] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Summary -->
        <div class="bg-white border border-gray-200 rounded-md p-3 text-xs space-y-2">
            <p class="text-gray-800 font-semibold text-sm">Payment Summary</p>

            <div class="flex justify-between">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-semibold">Rp{{ number_format($total_price) }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-600">Tax (10%)</span>
                <span class="font-semibold">Rp{{ number_format($total_price * 0.1) }}</span>
            </div>

            <div class="flex justify-between pt-2 border-t border-gray-200">
                <span class="text-gray-800 font-bold">Grand Total</span>
                <span class="text-blue-600 font-bold">
                    Rp{{ number_format($total_price + ($total_price * 0.1)) }}
                </span>
            </div>
        </div>

    </div>

    <!-- Footer: Select Status -->
    <div class="border-t border-gray-200 bg-white p-3 rounded-b-md">

        <select 
            wire:change="updateStatus({{ $detail['id'] }}, $event.target.value)"
            class="block w-full px-3 py-2 border border-gray-300 rounded-md text-xs font-semibold focus:ring-blue-500 focus:border-blue-500">

            <option value="" class="font-bold">Select Status</option>
            <option value="NEW ORDER" class="text-green-600 font-bold" {{ $status=="NEW ORDER"?"selected":"" }}>
                New Order
            </option>
            <option value="ON COOK" class="text-yellow-600 font-bold" {{ $status=="ON COOK"?"selected":"" }}>
                On Cook
            </option>
            <option value="DONE" class="text-blue-600 font-bold" {{ $status=="DONE"?"selected":"" }}>
                Done
            </option>
            <option value="CANCELED" class="text-red-600 font-bold" {{ $status=="CANCELED"?"selected":"" }}>
                Canceled
            </option>

        </select>

    </div>

</div>
