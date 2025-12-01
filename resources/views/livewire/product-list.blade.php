@php
    function formatRupiah($angka) {
        return number_format($angka, 0, ',', '.');
    }
@endphp
<div class="w-full flex flex-wrap mt-4 px-6 gap-x-5 gap-y-2 pr-80">
    
    @foreach ($data as $item)
        <div class="bg-white shadow-sm w-56 h-84 rounded-lg m-2 flex flex-col">
            <img src="{{ asset('/storage/' . $item->image) }}" alt="image" class="w-56 h-44 m-auto rounded-t-lg" />
            <div class="flex justify-between items-center px-4 pt-4">
                <p class="text-lg text-gray-700 font-bold line-clamp-1">{{ $item->name_product }}</p>
            </div>

            <div class="flex justify-between items-center px-4 pt-2">
                <p class="font-semibold text-[#4C81F1]">Rp{{ formatRupiah($item->price) }}</p>
                <p class="text-sm text-gray-500">Stock : {{ $item->stock }}</p>
            </div>

            <div class="p-4">
                <button  wire:click="add({{ $item->id }},'{{ $item->name_product }}',{{ $item->price }},{{ $item->stock }},'{{ $item->category }}')" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer">
                    Add to Transaction
                </button>
            </div>

        </div>
    @endforeach
</div>
