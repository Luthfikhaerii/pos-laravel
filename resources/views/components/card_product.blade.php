<div class="bg-white shadow-sm w-64 h-76 rounded-lg m-4">
    <img src="kopi.png" class="w-58 h-44 m-auto pt-4 rounded-lg"/>
    <p class="text-lg font-bold px-4 pt-4 line-clamp-1">{{ $title }}</p>
    <p class="px-4 pt-1 font-semibold text-[#4C81F1]">Rp{{ $price }}</p>
    <div class="flex justify-between px-4 py-2">
        <a href="{{ $editUrl }}" class="w-24 h-8 bg-[#4C81F1] rounded-lg flex items-center justify-center text-white font-semibold">Edit</a>
        <a href="{{ $deleteUrl }}" class="w-24 h-8 bg-red-500 rounded-lg flex items-center justify-center text-white font-semibold">Delete</a>
  
    </div>
</div>