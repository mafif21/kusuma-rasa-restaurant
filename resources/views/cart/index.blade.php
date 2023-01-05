<x-app-layout>
  <x-slot name="title">Menu</x-slot>

  <x-container>
    <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
              <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                  Cart
                  <div class="flex justify-between">
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo {{ auth()->user()->name}} ini adalah keranjang pesananmu</p>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Rp. {{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</p>
                  </div>
              </caption>
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                          <th scope="col" class="py-3 px-6">
                              Menu Name
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Quantity
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Price
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($carts as $cart)
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <tr class="bg-white border-b">
                            <th>
                                <input type="text" value="{{ $cart->name }}" class="py-4 px-6 font-normal border-none" name="name" readonly>
                            </th>
                            <th>
                                <input type="text" value="{{ $cart->qty }}" class="py-4 px-6 font-normal border-none" name="qty" readonly>
                            </th>
                            <th>
                                <input type="text" value="{{ $cart->price }}" class="py-4 px-6 font-normal border-none" name="price" readonly>
                            </th>
                            <th>
                                <button type="submit" class="bg-red-400">Order</button>
                            </th>
                            
                        </tr>
                    </form>
                    @endforeach
                  </tbody>
          </table>
    </div>
  </x-container>
</x-app-layout>


                      