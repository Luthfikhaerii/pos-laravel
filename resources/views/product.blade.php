<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <section class="flex-1 flex flex-col min-h-screen h-full">
           <div class="h-20 bg-gray-200 w-full">
                <p class="ml-2 text-2xl">Product List</p>
           </div>
           <div class="flex w-full px-4">
                <div class="w-36 h-14 flex items-center border-b-4 border-[#4C81F1]">
                    <p class="text-center font-semibold m-auto">All</p>
                </div>
                <div class="w-36 h-14 flex items-center">
                    <p class="text-center font-semibold m-auto">Food</p>
                </div>
                <div class="w-36 h-14 flex items-center">
                    <p class="text-center font-semibold m-auto">Drink</p>
                </div>
           </div>
           <div  class="bg-gray-100 w-full flex-1">
               <p>woyy</p>
           </div>
        </section>
    </div>
    
</body>
</html>