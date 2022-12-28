<x-admin-layout>
  <x-slot name="title">Create Menu</x-slot>

  <x-slot name="slot">
    <div class="grid justify-items-center">
      <div class="border border-gray-200 shadow-md w-9/12 p-20 rounded-lg">
        <div class="mb-6">
          <h1 class="font-semibold text-xl mb-1 text-slate-900">Add New Menu</h1>
          <p class="mt-1 text-sm font-normal text-gray-500">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
        </div>

        <form method="post" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Menu Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="menu name" value="{{ old('name') }}">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Image</label>
            <input name="image" class="block p-3 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Price</label>
            <input type="text" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " placeholder="menu price" value="{{ old('price') }}">
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Menu Category</label>
            <div id="category">
              <ul class="w-48 text-sm font-medium text-gray-900 bg-gray-50 rounded-lg border border-gray-200">
                @foreach ($categories as $category)
                <li class="w-full rounded-t-lg border-b border-gray-200">
                  <div class="flex items-center pl-3">
                      <input id="radio-title" type="radio" value="{{ $category->id }}" name="category" class="w-4 h-4 text-blue-600 bg-white border-gray-300 focus:ring-blue-500 ">
                      <label for="radio-title" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 ">{{ $category->name }}</label>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Description</label>
            <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="menu Description">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
          </div>
          
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add menu</button>
        </form>
        
      </div>
    </div>
  </x-slot>
</x-admin-layout>
