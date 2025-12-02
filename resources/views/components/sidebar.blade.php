@props([])

@php
    $menuItems = [
        [
            'title' => 'Menu',
            'url' => '/',
            'match' => '/',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5M3.75 12h16.5m-16.5 6.75h16.5" /></svg>',
        ],
        [
            'title' => 'Order List',
            'url' => '/order',
            'match' => 'order',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3h9a2.25 2.25 0 012.25 2.25V21l-6.75-3.375L5.25 21V5.25A2.25 2.25 0 017.5 3z" /></svg>',
        ],
        [
            'title' => 'History',
            'url' => '/history',
            'match' => 'history',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
        [
            'title' => 'Product',
            'url' => '/product',
            'match' => 'product',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75L12 3l7.5 3.75M4.5 6.75v10.5L12 21l7.5-3.75V6.75M4.5 6.75L12 10.5l7.5-3.75" /></svg>',
        ],
        [
            'title' => 'Report',
            'url' => '/report',
            'match' => 'report',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3V3zm3 14h3v-4H6v4zm6 0h3v-8h-3v8zm6 0h3v-12h-3v12z" /></svg>',
        ],
    ];
@endphp

<div class="w-64 fixed left-0 top-0 min-h-screen bg-white flex flex-col justify-between shadow-xl border-r border-gray-200">
    <!-- Logo Section -->
    <div>
        <div class="px-4 py-6 border-b border-gray-200">
            <div class="flex items-center justify-center space-x-2 mb-1">
                <!-- Coffee Cup Icon -->
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 21h18v-2H2v2zM20 8h-2V5h2c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2h-2c-1.66 0-3-1.34-3-3V5c0-1.66 1.34-3 3-3h2v2zm-4-2H6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2z"/>
                    </svg>
                    <div class="absolute -top-1 -right-1 w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                </div>
                <div>
                    <p class="font-bold text-gray-800 text-xl leading-tight">Caffé<span class="text-blue-600">Point</span></p>
                    <p class="text-xs text-gray-500 font-medium">POS System</p>
                </div>
            </div>
        </div>

        <!-- Menu Navigation -->
        <nav class="px-3 py-4 space-y-1">
            @foreach ($menuItems as $item)
                @php
                    $isActive = request()->is($item['match']) || request()->is($item['match'].'/*');
                @endphp

                <a href="{{ $item['url'] }}"
                   class="group flex items-center px-4 py-2.5 rounded-lg transition-all duration-200 relative overflow-hidden
                          {{ $isActive 
                             ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' 
                             : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                    
                    <!-- Active Indicator -->
                    @if($isActive)
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-blue-400 rounded-r-full"></div>
                    @endif
                    
                    <!-- Icon -->
                    <span class="mr-3 {{ $isActive ? 'scale-110' : 'group-hover:scale-110' }} transition-transform duration-200">
                        {!! $item['icon'] !!}
                    </span>
                    
                    <!-- Title -->
                    <p class="font-semibold text-sm ml-2">{{ $item['title'] }}</p>
                    
                    <!-- Hover Effect -->
                    @if(!$isActive)
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/0 via-blue-600/5 to-blue-600/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    @endif
                </a>
            @endforeach
        </nav>
    </div>

    <!-- Logout Section -->
    <div class="border-t border-gray-200 p-3">
        <a href="{{ route('logout_user') }}"
           class="group flex items-center justify-center px-3 py-2.5 text-red-600 font-semibold rounded-lg hover:bg-red-50 transition-all duration-200 relative overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            <span class="text-sm">Logout</span>
            
            <!-- Hover Background -->
            <div class="absolute inset-0 bg-gradient-to-r from-red-600/0 via-red-600/5 to-red-600/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>
        
        <!-- Version Info -->
        <p class="text-center text-xs text-gray-400 mt-3">v1.0.0</p>
    </div>
</div>

<style>
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .5;
        }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>