<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order History - CafféPoint POS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/product.js'])
    @livewireStyles
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-h-screen ml-48">
            <!-- Header Section -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm pt-4">
                <div class="h-16 flex items-center px-8">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Order History</h1>
                        <p class="text-xs text-gray-500">View all completed and past orders</p>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="flex-1 bg-gray-50 p-6 overflow-y-auto">
                <div class="w-full mx-auto">
                    @livewire('history-list')
                </div>
            </div>
        </main>
    </div>
    
    @livewireScripts
</body>

</html>