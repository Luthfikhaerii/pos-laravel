<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - CafféPoint POS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/add_product.js'])
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-h-screen ml-48">
            <!-- Header Section -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm pt-4">
                <div class="h-16 flex items-center px-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ url('/product') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">Add New Product</h1>
                            <p class="text-xs text-gray-500">Create a new product in your inventory</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="flex-1 bg-gray-50 p-6 overflow-y-auto">
                <form class="bg-white rounded-lg shadow-md p-8" method="POST" action="{{ route('add_product.create') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Image Upload Section -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Product Image</label>
                            <div class="flex items-start gap-4">
                                <!-- Upload Button / Preview Container -->
                                <div class="relative w-32 h-32">
                                    <!-- Upload Button -->
                                    <label for="file-upload" id="upload-label"
                                        class="absolute inset-0 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-200">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="text-xs text-gray-500 mt-2 font-medium">Upload Image</span>
                                    </label>
                                    
                                    <!-- Image Preview -->
                                    <div id="image-preview" class="hidden absolute inset-0">
                                        <img id="preview-img" src="" alt="Preview" class="w-full h-full object-cover rounded-lg border-2 border-blue-500">
                                        <button type="button" id="remove-image" 
                                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg z-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="flex-1">
                                    <p class="text-xs text-gray-600 mb-1">Recommended image size: 800x800px</p>
                                    <p class="text-xs text-gray-500">Accepted formats: JPG, PNG (Max 2MB)</p>
                                </div>
                            </div>
                            <input id="file-upload" name="image" type="file" accept="image/*" class="hidden" />
                        </div>

                        <!-- Product Name -->
                        <div class="mb-6">
                            <label for="name_product" class="block text-sm font-semibold text-gray-700 mb-2">
                                Product Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name_product" 
                                   id="name_product"
                                   placeholder="e.g., Cappuccino, Nasi Goreng..." 
                                   required
                                   class="block w-full px-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>

                        <!-- Category -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select id="category" 
                                    name="category" 
                                    required
                                    class="block w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                <option value="">-- Select Category --</option>
                                <option value="food">🍔 Food</option>
                                <option value="drink">☕ Drink</option>
                            </select>
                        </div>

                        <!-- Price and Stock Row -->
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Price (Rp) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm">Rp</span>
                                    <input type="number" 
                                           name="price" 
                                           id="price"
                                           placeholder="0" 
                                           min="0"
                                           required
                                           class="block w-full pl-12 pr-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Stock <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           name="stock" 
                                           id="stock"
                                           placeholder="0" 
                                           min="0"
                                           required
                                           class="block w-full px-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg bg-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm">pcs</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4 border-t border-gray-200">
                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Add Product</span>
                            </button>
                            <a href="{{ url('/product') }}"
                               class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-all duration-200 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Image preview functionality
        const fileUpload = document.getElementById('file-upload');
        const uploadLabel = document.getElementById('upload-label');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const removeImage = document.getElementById('remove-image');

        fileUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadLabel.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImage.addEventListener('click', function() {
            fileUpload.value = '';
            previewImg.src = '';
            uploadLabel.classList.remove('hidden');
            imagePreview.classList.add('hidden');
        });
    </script>

</body>

</html>