<div class="w-full flex flex-wrap mt-4 px-6 gap-x-5 gap-y-2 pr-80">
    
    @foreach ($data as $item)
        <div class="bg-white shadow-sm w-72 h-64 rounded-lg m-2 ">
            <div class="flex justify-between items-center px-4 pt-4">
                <p class="text-lg text-gray-700 font-bold line-clamp-1">{{ explode(" ",$item->created_at)[1] }}</p>
                <p class="font-semibold">{{$item->status}}</p>
            </div>

            <div class="flex justify-between items-center px-4 pt-1 pb-2">
                
                <p class="text-sm text-gray-500 ">{{ $item->amount_item }} items</p>
                <p class="font-semibold text-[#4C81F1]">Rp{{ $item->total_price }}</p>
            </div>
            <div class="h-28 overflow-hidden">
                @foreach ( $item->transaction_item as $t_item )
                    <div class="flex w-64 m-auto justify-between pb-1">
                        <div class="flex">
                           <p>{{ $t_item['amount'] }}</p>
                            <p class="w-32 line-clamp-1 ml-2">{{ $t_item['name_product'] }}</p>
                        </div>
                        <p>{{ $t_item['price'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="px-4 pb-2">
                <button  wire:click="addDetail({{ $item->id }},'{{ $item->transaction_item }}',{{ $item->total_price }},{{ $item->amount_item }},'{{ $item->created_at }}','{{ $item->status }}')" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer">
                    Detail
                </button>
            </div>

        </div>
    @endforeach
    <div class="w-[30%] m-auto mt-4">{{ $data->links() }}</div>  
</div>

