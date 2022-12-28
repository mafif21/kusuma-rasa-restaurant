<x-app-layout>
    <x-slot name="title">Menu</x-slot>

    <x-container>
        <div class="jumbotron mb-10">
            <img src="{{ asset('images/hero/menus.jpg') }}" alt="jumbotron" class="object-cover w-full rounded" style="height: 20rem">
        </div>

        <div>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold">All Menus</h1>
                <form class="w-1/3">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="" required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>

            <div class="grid lg:grid-cols-3 gap-x-4 gap-y-10">
                @foreach ($menus as $menu)
                <div class="max-w-sm bg-white rounded-lg">
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
                        
                        {{-- <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-container>
</x-app-layout>
