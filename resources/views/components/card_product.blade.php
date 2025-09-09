<div class="bg-white shadow-sm w-72 h-80 rounded-lg m-4">
    <img src="kopi.png" class="w-64 h-48 m-auto pt-5 rounded-lg"/>

    <div class="flex justify-between items-center px-4 pt-2">
        <p class="text-lg text-gray-700 font-bold line-clamp-1">{{ $name }}</p>
    </div>

    <div class="flex justify-between items-center px-4 pt-1 pb-2">
        <p class="font-semibold text-[#4C81F1]">Rp{{ $price }}</p>
        <p class="text-sm text-gray-500">Stock: {{ $stock }}</p>
    </div>

    <div class="flex justify-between px-4 pt-2">
        <a href="{{ $editUrl }}" class="w-24 h-8 bg-[#4C81F1] rounded-lg flex items-center justify-center text-white font-semibold">Edit</a>
        <a href="{{ $deleteUrl }}" class="w-24 h-8 bg-red-500 rounded-lg flex items-center justify-center text-white font-semibold">Delete</a>
    </div>
</div>