<x-app-layout>
    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-2 flex flex-col justify-center sm:py-12">

        <div class="grid grid-cols-2  place-content-end">
            <div class="dark:bg-gray-800 flex justify-center items-center">

                <fieldset class="text-xl w-2/3 border-2 border-indigo-400 shadow-neon rounded-lg px-4 py-2">
                    <legend class="px-1 font-semibold text-white">منو</legend>
                    <div class="text-white px-4  flex justify-end items-center">
                        <div class="relative py-2">
                            <div class="t-0 absolute left-3">
                                <p class="flex h-2 w-2 items-center justify-center rounded-full bg-purple-500 p-3 text-xs text-white">3</p>
                            </div>
                            <a href="{{ route('order') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @foreach($categories as $category)
                    <legend class="px-1 font-semibold pt-4  text-white"> {{ $category->title}}</legend>
                    <div class="flex flex-col p-2 gap-2 text-base text-white dark:text-gray-200">
                        @foreach($menus as $menu)
                        @if($menu->category_id == $category->id)
                        <div class="flex items-center justify-between space-y-2">
                            <span class="flex-shrink-0 text-lg text-white"> {{$menu->name}}</span>
                            <span class="border-b-4 border-dotted border-teal-200 flex-grow"></span>
                            <span class="flex-shrink-0 text-lg text-white font-mono"> {{$menu->price}}</span>
                            <div class="pr-4">
                                <a href="{{ route('order') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
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