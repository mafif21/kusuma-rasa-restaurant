<x-admin-layout>
    <x-slot name="title">Admin Menu</x-slot>
  
    <x-slot name="slot">
      <div class="flex justify-between mb-5 items-center">
          <div class="relative">
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8  4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              </div>
                  <input type="text" id="table-search" class="block p-3 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-200 focus:border-gray-200 border-gray-100 placeholder-gray-400 " placeholder="Search for items">
          </div>
          <div>
              <a href="{{ route('admin.menu.create') }}" class="text-white bg-orange-400 font-medium rounded-lg text-sm px-5 py-2.5">Add Menu</a>
          </div>
      </div>
  
      <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
              <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                  Menu
                  <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
              </caption>
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                          <th scope="col" class="py-3 px-6">
                              Menu Name
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Image
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Categories
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Price
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Description
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($menus as $menu)
                    <tr class="bg-white border-b hover:bg-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $menu->name }}
                        </th>
                        <td class="py-4 px-6">
                            <img src="{{ Storage::url($menu->image) }}" alt="menu img" class="w-20 rounded">
                        </td>
                        <td class="py-4 px-6">
                            {{ $menu->categories->name }}
                        </td>
                        <td class="py-4 px-6">
                            Rp. @money($menu->price)
                        </td>
                        <td class="py-4 px-6">
                            {{ $menu->description }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-4 items-center">
                                <a href="{{ route('admin.menu.edit', $menu->slug) }}" class="font-medium text-blue-600">Edit</a>
                                <form action="{{ route('admin.menu.destroy', $menu->slug) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="font-medium text-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
          </table>
      </div>
    </x-slot>
  </x-admin-layout>
  