<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        @include('components.sidebar')
        <section class="w-full flex-1">
            <div class="h-20 flex items-center border-b-2 border-gray-200 w-full">
                <p class="ml-8 text-2xl font-bold text-[#585A5C]">Add Product</p>
           </div>
            <h1 class="text-3xl font-bold underline">Welcome to the Dashboard</h1>
             <p class="font-bold">This is a simple dashboard page.</p>
            <p class="bg-black">You can customize it as needed.</p>
        </section>
    </div>
    
</body>
</html>