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
        <section class="ml-48 flex-1 flex flex-col min-h-screen h-full">

            <div class="bg-gray-100 w-full flex-1 pb-8">
                <div class="flex">
                    <div class="w-full ">
                        <!-- Header Section -->
                        <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm pt-4">
                            <!-- Title Bar -->
                            <div class="h-16 flex items-center px-6 border-b border-gray-100">
                                <div>
                                    <h1 class="text-xl font-bold text-gray-800">Menu</h1>
                                    <p class="text-xs text-gray-500">Browse and select products</p>
                                </div>
                            </div>

                            <!-- Category Tabs -->
                            <nav class="flex px-6 gap-1 overflow-x-auto">
                                <a href="{{ url('/') }}"
                                    class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == null
                                  ? 'text-blue-600'
                                  : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                    <span>All Products</span>
                                    @if (request()->query('category') == null)
                                        <div
                                            class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                        </div>
                                    @endif
                                </a>

                                <a href="{{ url('/?category=food') }}"
                                    class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == 'food'
                                  ? 'text-blue-600'
                                  : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                    <span>Food</span>
                                    @if (request()->query('category') == 'food')
                                        <div
                                            class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                        </div>
                                    @endif
                                </a>

                                <a href="{{ url('/?category=drink') }}"
                                    class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == 'drink'
                                  ? 'text-blue-600'
                                  : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                    <span>Drink</span>
                                    @if (request()->query('category') == 'drink')
                                        <div
                                            class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                        </div>
                                    @endif
                                </a>
                            </nav>
                        </header>
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
