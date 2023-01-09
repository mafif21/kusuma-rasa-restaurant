<x-app-layout>
  <x-slot name="title">Detail</x-slot>

  <x-container>
      <div class="grid grid-cols-2">
          <div class="image">
            <img class="rounded shadow-lg h-96 w-full object-cover" src="{{ Storage::url($food->image) }}" alt="card-image" />
          </div>

          <div class="detail px-8">
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="font-semibold text-2xl">{{ $food->name }}</h1>
                    <h2 class="mb-2 font-semibold text-red-400">Rp. @money($food->price)</h2>
                </div>
                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ $food->categories->name }}</span>
            </div>
            <div>
                <h5 class="font-semibold mb-2">Description</h5>
                <p class="text-sm text-gray-500">{{ $food->description }}</p>
            </div>
          </div>
      </div>
  </x-container>
</x-app-layout>