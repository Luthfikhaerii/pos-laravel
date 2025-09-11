<div class="pt-4">
    <div class="flex w-full p-2 justify-between">
        <div class="flex mb-4 bg-white shadow-sm rounded-lg">
            <div class="px-4 py-2 ">
                <label for="start_date" class="block text-sm font-medium text-gray-700 ">Start Date</label>
                <input type="date" wire:model="start_date" id="start_date"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="px-4 py-2 ml-2">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" wire:model="end_date" id="end_date"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </div>

    </div>
    <div>
        <div class="w-full h-14 shadow-sm my-2 flex items-center bg-white px-4 rounded-t-lg">
            <p class="text-base font-bold text-gray-700 ml-4 w-5 text-center">No</p>
            <div class="w-full grid grid-cols-4 justify-center px-20 text-base font-bold text-gray-700">
                <p class="text-center">Date</p>
                <p class="text-center">Time</p>
                <p class="text-center">Amount Items</p>
                <p class="text-center">Total</p>
            </div>
            <p class="w-28 text-center mr-4 text-base font-bold text-gray-700">Action</p>
        </div>

        <div class="w-full h-14 shadow-sm my-2 flex items-center bg-white px-4">
            <p class="text-base font-semibold text-gray-500 ml-4 w-5 text-center">2</p>
            <div class="w-full grid grid-cols-4 justify-center px-20 text-base font-semibold text-gray-500">
                <p class="text-center">12-2-2025</p>
                <p class="text-center">20:50</p>
                <p class="text-center">2</p>
                <p class="text-center">Rp20.000</p>
            </div>
            <a href="#" class="h-10 w-28 bg-blue-400 rounded-lg flex items-center mr-4">
                <p class="m-auto text-center font-semibold text-white">Detail</p>
            </a>
        </div>
    </div>
</div>
