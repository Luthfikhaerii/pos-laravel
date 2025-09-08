<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   @vite(['resources/js/product.js'])
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <section class="flex-1 flex flex-col min-h-screen h-full">
           <div class="h-20 flex items-center border-b-2 border-gray-200 w-full">
                <p class="ml-8 text-2xl font-bold text-[#585A5C]">Product List</p>
           </div>
           <div class="flex w-full px-4">
                <div class="w-36 h-14 flex items-center border-b-4 border-[#4C81F1] cursor-pointer text-[#4C81F1] category-1">
                    <p class="text-center font-semibold m-auto">All</p>
                </div>
                <div class="w-36 h-14 flex items-center cursor-pointer text-[#585A5C] category-2">
                    <p class="text-center font-semibold m-auto ">Food</p>
                </div>
                <div class="w-36 h-14 flex items-center cursor-pointer text-[#585A5C] category-3">
                    <p class="text-center font-semibold m-auto ">Drink</p>
                </div>
           </div>
           <div  class="bg-gray-100 w-full flex-1">
                <div class="flex items-center rounded-lg w-40 h-10 bg-[#4C81F1] justify-center shadow-sm m-4">
                    <p class="font-semibold text-white">+ Add Product</p>
                </div>
                <div>
                    @foreach ( $products as $product )
                        <x-card_product 
                            img="{{ asset('img/contoh.jpg') }}" 
                            title="{{ $product->name }}" 
                            price="{{ $product->price }}"
                            editUrl="{{ route('product.edit', $product->id) }}"
                            deleteUrl="{{ route('product.destroy', $product->id) }}"
                        />    
                    @endforeach
                </div>
           </div>
        </section>
    </div>
</body>
</html>