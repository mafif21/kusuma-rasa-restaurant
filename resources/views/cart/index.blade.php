<x-app-layout>
  <x-slot name="title">Menu</x-slot>

  <x-container>
      <div>
        <h1>Cart Detail</h1>
        
        @foreach ($carts as $cart)
            <div class="flex gap-x=-4">
              <p>{{ $cart->name }}</p>
              <p>{{ $cart->qty }}</p>
            </div>
        @endforeach
      </div>
  </x-container>
</x-app-layout>


                      