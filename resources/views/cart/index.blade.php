<x-app-layout>
  <x-slot name="title">Menu</x-slot>

  <x-container>
    
<div class="relative overflow-x-auto">
    @if (session()->has('success'))
        <x-success-alert statusText="{{ session('success') }}"></x-success-alert>
    @endif
    
    <table class="w-full text-sm text-left text-gray-500 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)   
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                        {{ $cart->name }}
                    </th>
                    <td class="px-6 py-4">
                        <form action="{{ route('cart.update', $cart->rowId) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="flex">
                                <input type="number" name="qty" class="w-20 border border-gray-300 rounded-l" value="{{ $cart->qty }}">
                                <input type="submit" class="bg-blue-400 text-white py-2 px-5 rounded-r" value="Update">
                            </div>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        {{ $cart->price }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-x-3">
                            <form action="{{ route('cart.destroy', $cart->rowId) }}" method="get">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 rounded text-white py-2 px-5">Delete</button>
                            </form>
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{ $cart->name }}">
                                <input type="hidden" name="qty" value="{{ $cart->qty }}">
                                <input type="hidden" name="price" value="{{ $cart->price }}">
                                <button type="submit" class="bg-blue-400 rounded text-white py-2 px-5">Order</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="font-semibold text-gray-900">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3">{{ Gloudemans\Shoppingcart\Facades\Cart::count() }}</td>
                <td class="px-6 py-3">Rp. {{ Gloudemans\Shoppingcart\Facades\Cart::total() }}</td>
            </tr>
        </tfoot>
    </table>
</div>

  </x-container>
</x-app-layout>



{{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
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
          <form action="{{ route('cart.update', $cart->rowId) }}" method="post">
              @method('put')
              @csrf
              <tr class="bg-white border-b">
                  <th>
                      <input type="text" value="{{ $cart->name }}" class="py-4 px-6 font-normal border-none" name="name" readonly>
                  </th>
                  <th>
                      <input type="number" value="{{ $cart->qty }}" class="py-4 px-6 font-normal border-none" name="qty">
                  </th>
                  <th>
                      <input type="text" value="{{ $cart->price }}" class="py-4 px-6 font-normal border-none" name="price" readonly>
                  </th>
                  <th>
                      <button type="submit" class="bg-blue-400 text-white py-2 px-5 rounded">Order</button>
                  </th>
                  
              </tr>
          </form>
          @endforeach
        </tbody>
</table> --}}