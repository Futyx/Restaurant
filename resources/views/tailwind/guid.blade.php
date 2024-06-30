<x-app-layout>
    <div class="flex py-4">
        <div class="w-1/4 bg-pink-500 text-white text-center py-4">Sidebar</div>
        <div class="flex-1 bg-gray-200 text-center ">
            <div class="flex flex-col">
                <div class="bg-purple-500 text-white text-center py-4">
                    Top Section
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-2/3 bg-yellow-500 text-white text-center">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="box-border h-32 w-32 p-4 border-4 bg-blue-500 text-white text-center py-4">Column 1</div>
                            <div class="bg-gray-500 text-center py-4">Column 2</div>
                            <div class="bg-blue-900 text-white text-center py-4">Column 3</div>
                        </div>

                    </div>
                    <div class="w-full md:w-1/2 bg-gray-200 text-center ">
                        <div class=" h-64 flex items-center justify-center bg-green-500 text-white">
                            Centered Content

                            


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>