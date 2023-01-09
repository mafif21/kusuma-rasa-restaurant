<x-app-layout>
  <x-slot name="title">Home</x-slot>

  <x-slot name="slot">
      <div class="grid text-center h-52 items-center">
        <div>
          <h1 class="text-3xl lg:text-6xl mb-3">Thank You</h1>
          <p class="mb-5 lg:text-lg text-sm">your order has been received, <span class="text-orange-500">have a great day</span></p>
          <p class="text-xs lg:text-sm">Back To <a href="{{ route('home') }}" class="text-orange-500">Home</a></p>
        </div>
      </div>
  </x-slot>
</x-app-layout>
