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
        <section class="ml-56 flex-1 flex flex-col min-h-screen h-full">
            <div class="h-20 flex items-center border-b-2 border-gray-200 w-full">
                <p class="ml-10 text-2xl font-bold text-[#585A5C]">History Order</p>
            </div>
            <div class="bg-gray-100 w-full flex-1 px-4 pb-8">
                @livewire('history-list')
            </div>
        </section>
    </div>
    @livewireScripts
</body>

</html>
