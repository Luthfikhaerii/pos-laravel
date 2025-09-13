<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/product.js'])
    @livewireStyles
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <section class="ml-64 flex-1 flex flex-col min-h-screen h-full">

            <div class="bg-gray-100 w-full flex-1 pb-8">
                <div class="flex">
                    <div class="w-full ">
                        <div class="h-20 flex items-center border-b-2 border-gray-200 w-full bg-white">
                            <p class="ml-10 text-2xl font-bold text-[#585A5C]">Menu</p>
                        </div>
                        <div class="flex w-full bg-white pl-10">
                            <a class="w-36 h-14 flex items-center cursor-pointer category-1 {{ request()->query('category') == null ? 'border-b-4 border-[#4C81F1] text-[#4C81F1]' : 'text-[#585A5C]' }}"
                                href="{{ url('/') }}">
                                <p class="text-center font-semibold m-auto">All</p>
                            </a>
                            <a class="w-36 h-14 flex items-center cursor-pointer category-2 {{ request()->query('category') == 'food' ? 'border-b-4 border-[#4C81F1] text-[#4C81F1]' : 'text-[#585A5C]' }}"
                                href="{{ url('/?category=food') }}">
                                <p class="text-center font-semibold m-auto ">Food</p>
                            </a>
                            <a class="w-36 h-14 flex items-center cursor-pointer category-3 {{ request()->query('category') == 'drink' ? 'border-b-4 border-[#4C81F1] text-[#4C81F1]' : 'text-[#585A5C]' }}"
                                href="{{ url('/?category=drink') }}">
                                <p class="text-center font-semibold m-auto ">Drink</p>
                            </a>
                        </div>
                        @livewire('product-list')
                    </div>
                    @livewire('cart')
                </div>
            </div>
        </section>
    </div>
    @livewireScripts
</body>

</html>
