<div class="bg-white shadow-sm w-72 h-80 rounded-lg m-4 flex flex-col justify-between">
    <!-- Gambar produk -->
    <img src="kopi.png" class="w-64 h-48 m-auto pt-5 rounded-lg"/>

    <!-- Nama produk -->
    <div class="flex justify-between items-center px-4 pt-2">
        <p class="text-lg text-gray-700 font-bold line-clamp-1">{{ $name }}</p>
    </div>

    <!-- Harga & stock -->
    <div class="flex justify-between items-center px-4 pt-1 pb-2">
        <p class="font-semibold text-[#4C81F1]">Rp{{ $price }}</p>
        <p class="text-sm text-gray-500">Stock : <span id="stock-{{ $id }}">{{ $stock }}</span></p>
    </div>

    <!-- Increment & Decrement -->
    <div class="flex justify-between px-4 pt-2">
        <button onclick="decrementStock({{ $id }})" 
            class="w-24 h-8 bg-red-500 rounded-lg flex items-center justify-center text-white font-semibold">
            -
        </button>
        <p>{{ $stock }}</p>
        <button onclick="incrementStock({{ $id }})" 
            class="w-24 h-8 bg-green-500 rounded-lg flex items-center justify-center text-white font-semibold">
            +
        </button>
    </div>

    <!-- Add to Cart -->
    <div class="px-4 pb-4">
        <button class="w-full h-10 bg-[#4C81F1] rounded-lg flex items-center justify-center text-white font-semibold">
            Add to Cart
        </button>
    </div>
</div>