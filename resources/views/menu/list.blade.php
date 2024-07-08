<x-app-layout>
    <div class="relative z-10 mx-auto max-w-md">

        @foreach($categories as $category)



        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 max-w-sm mx-auto mt-24">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWeECgpU7ndozaDY-cS3QKLjvSL7stKvYsOQ&s" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
            <h3 class="z-10 mt-3 text-3xl font-bold text-white">{{ $category->title}}</h3>
          
                <div class="z-10 gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                    @foreach ($category->menus as $menu)
                    <li>{{ $menu->name }}</li>

                    @endforeach

                </div>

        </article>


        @endforeach


    </div>

</x-app-layout>