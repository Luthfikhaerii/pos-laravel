<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/add_product.js'])
</head>

<body>
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <section class="ml-64 w-full flex-1 flex flex-col ">
            <div class="h-20 flex items-center border-b-2 border-gray-200 w-full">
                <p class="ml-10 text-2xl font-bold text-[#585A5C]">History Detail</p>
            </div>
            <div class="bg-gray-100 flex flex-col flex-1 h-full">
                {{-- ISI --}}
                <div class="flex-1 bg-white shadow-sm min-h-[550px] rounded-sm flex flex-col m-4">
                    <div class="p-4 mx-2 h-20 items-center  mb-4">
                        <h2 class="text-2xl mt-4 font-bold text-gray-600">Transaction</h2>
                        <div class="flex mt-2">
                            <p class="font-semibold text-sm">{{explode(" ",$data['created_at'])[0]}}</p>
                            <p class="font-semibold text-sm ml-4">{{explode(" ",$data['created_at'])[1]}}</p>
                        </div>
                    </div>
                    <div class="flex-1 p-4 space-y-3">
                        @if (isset($data))
                            @foreach ($data->transaction_item as $item)
                                <div class="flex items-center justify-between border-b border-gray-200 px-2 pb-3">
                                    <div class="w-28">
                                        <p class="font-semibold text-sm text-gray-800 line-clamp-2">
                                            {{ $item['name_product'] }}</p>
                                        <p class="text-blue-500 text-xs font-semibold">Rp{{ $item['price'] }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-6 text-sm text-center font-medium">{{ $item['amount'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="border-t border-gray-300 p-4 bg-gray-50">
                        <div class="flex justify-between text-sm mb-2">
                            <span>Total Item:</span>
                            <span>{{ $data['amount_item'] }}</span>
                        </div>
                        <div class="flex justify-between font-semibold mb-4">
                            <span>Total Price:</span>
                            <span>Rp{{ number_format($data['total_price']) }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

</body>

</html>
