<x-app-layout>
    <x-slot name="title">Menu</x-slot>

    <x-container>
        <div class="jumbotron mb-10 relative lg:block hidden">
            <div class="w-full h-full bg-orange-100 flex justify-between items-center rounded">
                <div class="w-1/3 px-14">
                    <h1 class="font-normal text-5xl text-black mb-6">Customer is King</h1>
                    <p class="text-sm text-secondary opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos doloribus provident tenetur error laudantium fug</p>
                </div>

                <div class="px-14 pt-14">
                    <img src="{{ asset('images/container-logo.svg') }}" alt="jumbotron" class="h-80">
                </div>
            </div>
            
        </div>

        <div>
            <div class="flex justify-between items-center mb-6 lg:flex-row flex-col">
                <h1 class="text-2xl font-semibold lg:mb-0 mb-10 text-slate-900">All Menus</h1>
                
                <div>
                    <input type="text" id="menu-search" class="block p-3 pl-4 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-200 focus:border-gray-200 border-gray-100 placeholder-gray-400 " placeholder="Search Menu" >
                </div>

            </div>

            <div class="grid lg:grid-cols-3 lg:gap-x-4 lg:gap-y-10 gap-y-5">
                @foreach ($menus as $menu)
                <div class="max-w-sm bg-white rounded-t-lg" id="card">
                    <div class="relative">
                        <div class="hover:bg-black opacity-40 ease-in-out duration-500 w-full h-full absolute rounded"></div>
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $menu->slug }}" name="slug">
                            <button type="submit" class="px-4 py-2 text-xs font-medium text-center text-white bg-orange-400 rounded-xl absolute m-4 right-0 bottom-0">Add to Cart</button>
                        </form>
                        <img class="rounded-t-lg h-48 w-full object-cover" src="{{ Storage::url($menu->image) }}" alt="card-image" />
                    </div>
                    <a href="{{ route('food.show', $menu->slug) }}" class="py-5 block">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900">{{ $menu->name }}</h5>
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ $menu->categories->name }}</span>
                        </div>
                        <div class="details mb-2 pr-5">
                            <p class="mb-2 font-semibold">Rp. @money($menu->price)</p>
                            <p class="font-normal text-sm text-gray-700">{{ Str::limit($menu->description, 90, '...') }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </x-container>
</x-app-layout>


                        