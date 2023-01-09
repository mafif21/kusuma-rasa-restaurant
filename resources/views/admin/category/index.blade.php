<x-admin-layout>
  <x-slot name="title">Admin Category</x-slot>

  <x-slot name="slot">
    <div class="flex justify-between mb-5 items-center">
        <div>
            <a href="{{ route('admin.category.create') }}" class="text-white bg-orange-400 font-medium rounded-lg text-sm px-5 py-2.5">Add Category</a>
        </div>
    </div>

    <div class="overflow-x-auto shadow-md relative sm:rounded-lg mx-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 ">
                Category Page
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo admin {{ auth()->user()->name }} semoga harimu bahagia, silahkan tambah, edit, hapus menu yang sudah ada pada halaman Category ini</p>
            </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Category Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Image
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
                    @foreach ($categories as $category)
                    <tr class="bg-white border-b hover:bg-gray-200">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $category->name }}
                        </th>
                        <td class="py-4 px-6">
                            <img src="{{ asset('storage/'.$category->image) }}" alt="category img" class="w-60 rounded">
                        </td>
                        <td class="py-4 px-6">
                            {{ Str::limit($category->description, 120, '...') }}
                            {{-- {{ $category->description }} --}}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-4 items-center">
                                <a href="{{ route('admin.category.edit', $category->slug) }}" class="font-medium text-blue-600">Edit</a>
                                <form action="{{ route('admin.category.destroy', $category->slug) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
