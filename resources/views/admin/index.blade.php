<x-admin-layout>
    <x-slot name="title">Admin Page</x-slot>
  
    <x-slot name="slot">
      <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
              <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                  Order Information
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
                        
                        <td class="py-4 px-6">
                            {{ $order->users->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $order->qty }}
                        </td>
                        <td class="py-4 px-6">
                            Rp. @money($order->price)
                        </td>

                        <td>
                            @if (!$order->status)
                                <form action="{{ route('admin.update', $order->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="1" name="status">
                                    <button type="submit" class="text-green-600">Accept</button>
                                </form>

                            @else
                            <p>Ordered</p>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                  </tbody>
          </table>
      </div>
    </x-slot>
  </x-admin-layout>
  