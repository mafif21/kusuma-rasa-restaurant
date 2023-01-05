<x-admin-layout>
  <x-slot name="title">Admin Category</x-slot>

  <x-slot name="slot">
    <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                Order Page
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo admin {{ auth()->user()->name }} semoga harimu bahagia, silahkan tambah, edit, hapus menu yang sudah ada pada halaman Order ini</p>
            </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Menu Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Customer
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Qty
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
                    @foreach ($orders as $order)
                    <tr class="bg-white border-b hover:bg-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $order->name }}
                        </th>

                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $order->users->name }}
                        </th>

                        <td class="py-4 px-6">
                            {{ $order->qty }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $order->price }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-4 items-center">
                                @if (!$order->status)
                                    <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <button class="text-green-500" type="submit">Accept Order</button>
                                    </form>
                                @else
                                <p>Order Complete</p>
                                @endif
                            </div>
                            </td>
                        </tr>
                    @endforeach
               
                </tbody>
        </table>
    </div>
  </x-slot>
</x-admin-layout>
