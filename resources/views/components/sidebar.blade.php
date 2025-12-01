@props([])

@php
    $menuItems = [
        [
            'title' => 'Menu',
            'url' => '/',
            'match' => '/',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5M3.75 12h16.5m-16.5 6.75h16.5" /></svg>',
        ],
        [
            'title' => 'Order List',
            'url' => '/order',
            'match' => 'order',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3h9a2.25 2.25 0 012.25 2.25V21l-6.75-3.375L5.25 21V5.25A2.25 2.25 0 017.5 3z" /></svg>',
        ],
        [
            'title' => 'History',
            'url' => '/history',
            'match' => 'history',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
        [
            'title' => 'Product',
            'url' => '/product',
            'match' => 'product',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75L12 3l7.5 3.75M4.5 6.75v10.5L12 21l7.5-3.75V6.75M4.5 6.75L12 10.5l7.5-3.75" /></svg>',
        ],
        [
            'title' => 'Report',
            'url' => '/report',
            'match' => 'report',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3V3zm3 14h3v-4H6v4zm6 0h3v-8h-3v8zm6 0h3v-12h-3v12z" /></svg>',
        ],
    ];
@endphp

<div class="w-64 fixed left-0 top-0 min-h-screen border-r-2 border-gray-200 flex flex-col justify-between bg-white">
    <!-- Logo -->
    <div>
        <p class="font-bold text-blue-600 text-3xl text-center py-6 mb-6">POS CAFFE</p>

        <!-- Menu -->
        <div class="px-4 space-y-1">
            @foreach ($menuItems as $item)
                @php
                    $isActive = request()->is($item['match']) || request()->is($item['match'].'/*');
                @endphp

                <a href="{{ $item['url'] }}"
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-150 
                          {{ $isActive ? 'bg-[#4C81F1] text-white shadow-sm' : 'hover:bg-gray-100 text-gray-600' }}">
                    <span class="mr-4">{!! $item['icon'] !!}</span>
                    <p class="font-semibold text-sm">{{ $item['title'] }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Logout -->
    <div class="border-t border-gray-200 py-4 flex items-center justify-center">
        <a href="{{ route('logout_user') }}"
           class="flex items-center px-4 py-2 text-red-600 font-semibold rounded-lg hover:bg-red-50 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            Logout
        </a>
    </div>
</div>
