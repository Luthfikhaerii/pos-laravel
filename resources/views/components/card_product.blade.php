@php
    function formatRupiah($angka) {
        return number_format($angka, 0, ',', '.');
    }
@endphp

<div class="bg-white shadow-sm w-72 h-80 rounded-lg m-4">
    
    <img src="{{ Storage::url($image) }}" alt="image" class="w-64 h-44 m-auto mt-4 rounded-lg object-cover"/>

    <div class="flex justify-between items-center px-4 pt-2">
        <p class="text-lg text-gray-700 font-bold line-clamp-1">{{ $name }}</p>
    </div>

    <div class="flex justify-between items-center px-4 pt-1 pb-2">
        <p class="font-semibold text-[#4C81F1]">Rp{{ formatRupiah($price) }}</p>
        <p class="text-sm text-gray-500">Stock : {{ $stock }}</p>
    </div>

    <div class="flex justify-between px-4 pt-1 pb-2 space-x-2">
        <a href="{{  url('/edit_product/'.$editUrl) }}" class="w-full h-8 bg-[#4C81F1] rounded-lg flex items-center justify-center text-white font-semibold">Edit</a>
        <a href="{{ url('/delete_product/'.$deleteUrl) }}" class="w-full h-8 bg-red-500 rounded-lg flex items-center justify-center text-white font-semibold" onclick="alert('delete product!')">Delete</a>
    </div>
</div>