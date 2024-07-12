<x-app-layout>
    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">

        <div class="grid grid-cols-2  place-content-end">
            <div class="dark:bg-gray-800 flex justify-center items-center">
                <fieldset class="text-xl w-2/3 border-2 border-indigo-400 shadow-neon rounded-lg px-4 py-2">
                <legend class="px-1 font-semibold text-white">منو</legend>

                @foreach($categories as $category)
                <legend class="px-1 font-semibold pt-4  text-white"> {{ $category->title}}</legend>
                    <div class="flex flex-col p-2 gap-2 text-base text-white dark:text-gray-200">
                        @foreach($menus as $menu)
                        @if($menu->category_id == $category->id)
                        <div class="flex items-center justify-between space-y-2">
                            <span class="flex-shrink-0 text-lg text-white"> {{$menu->name}}</span>
                            <span class="border-b-4 border-dotted border-teal-200 flex-grow"></span>
                            <span class="flex-shrink-0 text-lg text-white font-mono"> {{$menu->price}}</span>
                        </div>
                        @endif
                        @endforeach

                        @endforeach
                    </div>
                    
                </fieldset>
            </div>



        </div>
    </div>

</x-app-layout>