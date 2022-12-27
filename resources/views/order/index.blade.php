<x-app-layout>
    <x-slot name="title">Menu</x-slot>

    <x-container>
        <div class="grid lg:grid-cols-3 gap-x-4 gap-y-10">
            @foreach ($menus as $menu)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
                <div>
                    <img class="rounded-t-lg h-64 w-full object-cover" src="{{ Storage::url($menu->image) }}" alt="card-image" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $menu->name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">{{ $menu->description }}</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
