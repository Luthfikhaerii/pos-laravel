    <div class="w-64 fixed left-0 border-r-2 border-gray-200 border-r-sm min-h-screen">
        <p class="font-bold text-[#4C81F1] text-3xl text-center py-4 mb-10 mt-4">POS CAFFE</p>
        <div class="w-full m-auto px-4"> 
        <a href="/" class="block py-3 mb-2 px-4 rounded-lg {{ request()->is('/') ? 'bg-[#4C81F1]' : '' }}">
            <div class="flex items-center">
                    <img src="{{asset(request()->is('/') ? 'icon/subway_menu_active.svg':'icon/subway_menu.svg')}}" alt="icon" class="w-6 h-6 ml-[2px]"/>
                <p class="ml-5 font-semibold text-base {{request()->is('/') ? 'text-white':'text-[#585A5C]'}}">Menu</p>
            </div>   
        </a>
        <a href="/order" class="block py-3 mb-2 px-4 rounded-lg {{ request()->is('order') ? 'bg-[#4C81F1]' : '' }}">
            <div class="flex items-center">
                <img src="{{asset(request()->is('order') ? 'icon/lucide_square_white.svg':'icon/lucide_square-menu.svg')}}" alt="icon" class="w-7 h-7"/>

                <p class="ml-5 font-semibold text-base {{request()->is('order') ? 'text-white':'text-[#585A5C]'}}">Order List</p>
            </div>   
        </a>
        <a href="/history" class="block py-3 mb-2 px-4 rounded-lg {{ request()->is('history') ? 'bg-[#4C81F1]' : '' }}">
            <div class="flex items-center">
                <img src="{{asset(request()->is('history') ? 'icon/bxs_time_white.svg':'icon/bxs_time.svg')}}" alt="icon" class="w-7 h-7"/>
                <p class="ml-5 font-semibold text-base {{request()->is('history') ? 'text-white':'text-[#585A5C]'}}">History</p>
            </div>   
        </a>
        <a href="/product" class="block py-3 mb-2 px-4 rounded-lg {{ request()->is('product') || request()->is('add_product') ? 'bg-[#4C81F1]' : '' }}">
            <div class="flex items-center">
                <img src="{{asset(request()->is('product') || request()->is('add_product') ? 'icon/tdesign_menu_active.svg':'icon/tdesign_menu.svg')}}" alt="icon" class="w-7 h-7"/>
                <p class="ml-5 font-semibold text-base {{request()->is('product') || request()->is('add_product') ? 'text-white':'text-[#585A5C]'}}">Product</p>
            </div>   
        </a>
        <a href="/report" class="block py-3 mb-2 px-4 rounded-lg {{ request()->is('report') ? 'bg-[#4C81F1]' : '' }}">
            <div class="flex items-center">
                <img src="{{asset(request()->is('report') ? 'icon/mdi_report_white.svg':'icon/mdi_report-line.svg')}}" alt="icon" class="w-7 h-7"/>
                <p class="ml-5 font-semibold text-base {{request()->is('report') ? 'text-white':'text-[#585A5C]'}}">Report</p>
            </div>   
        </a>

        </div>
        <div class="border-t-2 border-gray-300 bottom-0 absolute flex items-center justify-center w-64 h-24 py-2">
            <a href="{{ route('logout_user')}}" class="py-2 w-54 px-4 font-semibold text-red-600 rounded-lg flex items-center border-gray-200 shadow-sm y-2"><img src="/icon/logout.svg" alt="" class="mr-4 w-9 h-9 "/> Logout</a>
        </div>   

    </div>