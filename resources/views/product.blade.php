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
        <section class="ml-48 flex-1 flex flex-col min-h-screen h-full">
          <!-- Header Section -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm pt-4">
                <!-- Title Bar -->
                <div class="h-16 flex items-center px-6 border-b border-gray-100">
                    <div class="flex-1">
                        <h1 class="text-xl font-bold text-gray-800">Product List</h1>
                        <p class="text-xs text-gray-500">Manage your product inventory</p>
                    </div>
                    
                    <!-- Add Product Button -->
                    <a href="{{ url('/add_product') }}"
                       class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-md transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02]"
                       style="font-size: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Add Product</span>
                    </a>
                </div>
                
                <!-- Category Tabs -->
                <nav class="flex px-6 gap-1 overflow-x-auto">
                    <a href="{{ url('/product') }}"
                       class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == null 
                                 ? 'text-blue-600' 
                                 : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                        <span>All Products</span>
                        @if(request()->query('category') == null)
                            <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                        @endif
                    </a>
                    
                    <a href="{{ url('/product?category=food') }}"
                       class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == 'food' 
                                 ? 'text-blue-600' 
                                 : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                        <span>Food</span>
                        @if(request()->query('category') == 'food')
                            <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                        @endif
                    </a>
                    
                    <a href="{{ url('/product?category=drink') }}"
                       class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                              {{ request()->query('category') == 'drink' 
                                 ? 'text-blue-600' 
                                 : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                        <span>Drink</span>
                        @if(request()->query('category') == 'drink')
                            <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                        @endif
                    </a>
                </nav>
            </header>
            <div class="bg-gray-100 w-full flex-1 p-6">
                <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4">
                    @foreach ( $data as $item )
                        <x-card_product category="{{ $item->category }}" price="{{ $item->price }}" name="{{ $item->name_product }}" editUrl="{{ $item->id }}"
                        deleteUrl="{{ $item->id }}" image="{{ $item->image }}" stock="{{ $item->stock }}" />
                    @endforeach
                </div>
              <div class="w-[30%] m-auto mt-4">{{ $data->links() }}</div>  
            </div>
        </section>
    </div>
</body>

</html>
