<x-app-layout>
    <x-slot name="title">Menu</x-slot>

    <x-container>
        <div class="jumbotron mb-10 relative">
            <div class="w-full h-full bg-orange-100 flex justify-between items-center rounded">
                <div class="w-1/3 px-14">
                    <h1 class="font-normal text-5xl text-black mb-6">Customer is King</h1>
                    <p class="text-sm text-secondary opacity-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos doloribus provident tenetur error laudantium fug</p>
                </div>

                <div class="px-14 pt-14">
                    <img src="{{ asset('images/container-logo.svg') }}" alt="jumbotron" class="h-80" style="">
                </div>
            </div>
            
        </div>

        <div>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">All Menus</h1>
                
                <div>
                    <input type="text" id="menu-search" class="block p-3 pl-4 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-200 focus:border-gray-200 border-gray-100 placeholder-gray-400 " placeholder="Search Menu" >
                </div>

            </div>

            <div class="grid lg:grid-cols-3 gap-x-4 gap-y-10">
                @foreach ($menus as $menu)
                <div class="max-w-sm bg-white rounded-lg" id="card">
                    <div class="relative">
                        <div class="hover:bg-black opacity-40 ease-in-out duration-500 w-full h-full absolute"></div>
                        <img class="rounded-t-lg h-48 w-full object-cover" src="{{ Storage::url($menu->image) }}" alt="card-image" />
                    </div>
                    <div class="py-5">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class=" text-xl font-bold tracking-tight text-gray-900">{{ $menu->name }}</h5>
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ $menu->categories->name }}</span>
                        </div>
                        <div class="details mb-2 pr-5">
                            <p class="mb-2 font-semibold">Rp. @money($menu->price)</p>
                            <p class="font-normal text-sm text-gray-700">{{ Str::limit($menu->description, 100, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-container>
</x-app-layout>

{{-- <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a> --}}