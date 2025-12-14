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


            <div class="flex bg-gray-100 w-full flex-1 pb-8">
                <div class="w-full">
                    <!-- Compact Header Section -->
                    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm pt-4">
                        <!-- Title Bar -->
                        <div class="h-16 flex items-center px-6 border-b border-gray-100">
                            <div>
                                <h1 class="text-xl font-bold text-gray-800">Order List</h1>
                                <p class="text-xs text-gray-500">Manage and track your orders</p>
                            </div>
                        </div>

                        <!-- Status Tabs -->
                        <nav class="flex px-6 gap-1 overflow-x-auto">
                            <a href="{{ url('/order') }}"
                                class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                  {{ request()->query('status') == null
                      ? 'text-blue-600'
                      : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                <span>All Orders</span>
                                @if (request()->query('status') == null)
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                    </div>
                                @endif
                            </a>

                            <a href="{{ url('/order?status=NEW ORDER') }}"
                                class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200 flex items-center gap-2
                  {{ request()->query('status') == 'NEW ORDER'
                      ? 'text-blue-600'
                      : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                <span>New Order</span>
                                @if (request()->query('status') == 'NEW ORDER')
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                    </div>
                                    <span
                                        class="ml-1 px-1.5 py-0.5 text-xs bg-blue-600 text-white rounded font-bold">New</span>
                                @endif
                            </a>

                            <a href="{{ url('/order?status=ON COOK') }}"
                                class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                  {{ request()->query('status') == 'ON COOK'
                      ? 'text-blue-600'
                      : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                <span>On Cook</span>
                                @if (request()->query('status') == 'ON COOK')
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                    </div>
                                @endif
                            </a>

                            <a href="{{ url('/order?status=DONE') }}"
                                class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                  {{ request()->query('status') == 'DONE'
                      ? 'text-blue-600'
                      : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                <span>Done</span>
                                @if (request()->query('status') == 'DONE')
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                    </div>
                                @endif
                            </a>

                            <a href="{{ url('/order?status=CANCELED') }}"
                                class="group relative px-5 py-3 text-sm font-semibold whitespace-nowrap transition-all duration-200
                  {{ request()->query('status') == 'CANCELED'
                      ? 'text-blue-600'
                      : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/30' }}">
                                <span>Canceled</span>
                                @if (request()->query('status') == 'CANCELED')
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600">
                                    </div>
                                @endif
                            </a>
                        </nav>
                    </header>
                    @livewire('order-list')
                </div>
                @livewire('order-detail')

            </div>
        </section>
    </div>
    @livewireScripts
</body>

</html>
