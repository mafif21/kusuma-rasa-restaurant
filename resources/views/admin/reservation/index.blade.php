<x-admin-layout>
  <x-slot name="title">Admin Reservation</x-slot>

  <x-slot name="slot">
    <div class="flex justify-between mb-5 items-center">
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8  4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
                <input type="text" id="table-search" class="block p-3 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-200 focus:border-gray-200 border-gray-100 placeholder-gray-400 " placeholder="Search for items">
        </div>
        <div>
            <a href="{{ route('admin.reservation.create') }}" class="text-white bg-orange-400 font-medium rounded-lg text-sm px-5 py-2.5">Add Reservation</a>
        </div>
    </div>

    <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                Reservation
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
            </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Reservation name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Type
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Reservation
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Price
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="py-4 px-6">
                            Sliver
                        </td>
                        <td class="py-4 px-6">
                            Laptop
                        </td>
                        <td class="py-4 px-6">
                            $2999
                        </td>
                        <td class="py-4 px-6 text-right flex gap-4">
                            <a href="#" class="font-medium text-blue-600">Edit</a>
                            <a href="#" class="font-medium text-red-600">Delete</a>
                        </td>
                    </tr>
                </tbody>
        </table>
    </div>
  </x-slot>
</x-admin-layout>
