<x-app-layout>
    <div class="bg-[url('https://i.postimg.cc/pTWvbSTL/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="grid grid-cols-2  place-content-end">

            <form action="" method="POST">
                @csrf
                @method('Post')
                <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-lg mx-auto ">
                    @foreach ($cartItems as $item)

                    <li>
                        <div class="px-4 py-5 sm:px-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">{{$item->name}}</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500"> {{$item->price}}</p>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">قیمت: {{$item->price*$item->quantity}}</p>
                                <div class="increase-quantity">

                                    <form class="max-w-xs mx-auto">
                                        <label for="quantity" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">تعداد:</label>
                                        <div class="relative flex items-center">
                                            <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="integer" id="quantity" data-input-counter class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="{{ $item->quantity }}" required />
                                            <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>

                        </div>
                    </li>

                    @endforeach

                    <li class="my-4 mx-10  border-t border-gray-200">
                        <p class="mt-4">جمع کل:</p>

                    </li>
                    <li class="border-t border-gray-200">
                        <div class="my-4 mx-10 flex items-center justify-between">
                            <p>وضعیت سفارش: </p>
                            <p class="text-sm font-medium text-gray-500"> <span class="text-green-600">پرداخت شده</span></p>
                            <p class="text-sm font-medium text-gray-500"> <span class="text-yellow-600">ارسال شده</span></p>
                            <p class="text-sm font-medium text-gray-500"> <span class="text-red-600">کنسل شده</span></p>
                        </div>

                    </li>
                    <li class="border-t border-gray-200">
                        <div class="my-4 mx-10 flex  items-center justify-between">
                            <p>rate us</p>
                            <div class="group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-500 group-hover:text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                </svg>
                            </div>
                            <div class="group">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6  text-gray-500 group-hover:text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                                </svg>
                            </div>
                            <button class="border border-blue-500 text-blue-500 font-bold py-2 px-4 rounded">
                                پرداخت
                            </button>
                        </div>
        </div>



        </li>
        </ul>
        </form>
    </div>
    </div>
</x-app-layout>