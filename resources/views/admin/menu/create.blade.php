<x-admin-layout>
  <x-slot name="title">Create Menu</x-slot>

  <x-slot name="slot">
    <div class="grid justify-items-center">
      <div class="border border-gray-200 shadow-md w-9/12 p-20 rounded-lg">
        <div class="mb-6">
          <h1 class="font-semibold text-xl mb-1 text-slate-900">Add New Menu</h1>
          <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
        </div>

        <form>
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Category Name</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="category name" required>
          </div>

          <div class="mb-6">
            <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Image</label>
            <input class="block p-3 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="file_input" type="file">
          </div>

          <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Description</label>
            <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="category name" required>
          </div>
          
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Category</button>
        </form>
        
      </div>
    </div>
  </x-slot>
</x-admin-layout>
