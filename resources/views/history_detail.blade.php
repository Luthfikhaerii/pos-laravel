<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/add_product.js'])
</head>

<body>
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <section class="w-full flex-1 flex flex-col">
            <div class="h-20 flex items-center border-b-2 border-gray-200 w-full">
                <p class="ml-10 text-2xl font-bold text-[#585A5C]">History Detail</p>
            </div>
            <div class="bg-gray-100 flex-1">
                <form class=" bg-white p-8 m-8 rounded-lg shadow-md space-y-6" method="POST" action="{{ route('product.update',['id'=>request()->route('id')]) }}" onsubmit="alert('Update product!')" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                    <label for="file-upload"
                        class="flex flex-col items-center justify-center w-24 h-24 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-100">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-xs text-gray-500 mt-1">Upload</span>
                    </label>

                    <input id="file-upload" name="image" type="file" id="imageInput" class="hidden" />

                    <div>
                        <label for="small-input" class="block mb-2 text-lg font-semibold text-gray-600">Name Product</label>
                        <input type="text" name="name_product" value="{{ $data->name_product }}" placeholder="Input title..." id="small-input"
                            class="block w-96 h-10 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <label for="category" class="block mb-2 text-lg font-semibold text-gray-600">Category</label>
                    <select id="category" name="category"
                        class="block w-96 p-2 border border-gray-300 rounded-lg focus:ring-blue-500  bg-gray-50 focus:border-blue-500" >
                        <option value="" >-- Choose --</option>
                        <option value="food" {{ $data->category == 'food' ? 'selected' : '' }}>Food</option>
                        <option value="drink" {{ $data->category == 'drink' ? 'selected' : '' }}>Drink</option>
                    </select>
                    <div>
                        <label for="small-input" class="block mb-2 text-lg font-semibold text-gray-600">Price</label>
                        <input type="number" placeholder="Input price..." id="small-input" name="price" value="{{ $data->price }}"
                            class="block w-96 h-10 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="small-input" class="block mb-2 text-lg font-semibold text-gray-600">Stock</label>
                        <input type="number" placeholder="Input stock..." id="small-input" name="stock" value="{{ $data->stock }}"
                            class="block w-96 h-10 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center">Update</button>
                </form>
            </div>
        </section>
    </div>

</body>

</html>