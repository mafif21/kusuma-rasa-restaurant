<x-admin-layout>
  <x-slot name="title">Create Table</x-slot>
  <x-slot name="slot">
    <div class="grid justify-items-center">
      <div class="border border-gray-200 shadow-md w-9/12 p-20 rounded-lg">
        <div class="mb-6">
          <h1 class="font-semibold text-xl mb-1 text-slate-900">Add New Table</h1>
          <p class="mt-1 text-sm font-normal text-gray-500">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
        </div>

        <form method="post" action="{{ route('admin.table.store') }}">
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Table Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="table name" value="{{ old('name') }}">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Capacity</label>
            <input type="text" id="capacity" name="guest_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " placeholder="table capacity" value="{{ old('guest_number') }}">
            <x-input-error :messages="$errors->get('guest_number')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Table Status</label>
            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach (App\Enums\TableStatus::cases() as $status)
                <option value="{{ $status->value }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-6">
            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Table location</label>
            <select id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach (App\Enums\TableLocation::cases() as $status)
                <option value="{{ $status->value }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>
          
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add Table</button>
        </form>
        
      </div>
    </div>
  </x-slot>
</x-admin-layout>
