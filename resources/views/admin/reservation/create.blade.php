<x-admin-layout>
  <x-slot name="title">Create Reservation</x-slot>

  <x-slot name="slot">
    <div class="grid justify-items-center">
      <div class="border border-gray-200 shadow-md w-9/12 p-20 rounded-lg">
        <div class="mb-6">
          <h1 class="font-semibold text-xl mb-1 text-slate-900">Add New Reservation</h1>
          <p class="mt-1 text-sm font-normal text-gray-500">Halo admin {{ auth()->user()->name}} silahkan tambah, edit atau hapus menu yang tersedia, Have a nice day</p>
        </div>

        <form method="post" action="{{ route('admin.reservation.store') }}">
          @csrf
          <div class="mb-6">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">First Name</label>
            <input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="first name" value="{{ old('first_name') }}">
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 " placeholder="last name" value="{{ old('last_name') }}">
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Email</label>
            <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " placeholder="email" value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Phone</label>
            <input type="number" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " placeholder="phone number" value="{{ old('phone') }}">
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Booking Date</label>
            <input type="date" id="date" name="res_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " value="{{ old('res_date') }}">
            <x-input-error :messages="$errors->get('res_date')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Person</label>
            <input type="text" id="guest_number" name="guest_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3 " placeholder="person" value="{{ old('guest_number') }}">
            <x-input-error :messages="$errors->get('guest_number')" class="mt-2" />
          </div>

          <div class="mb-6">
            <label for="table" class="block mb-2 text-sm font-medium text-gray-900 font-semibold">Table</label>
            <select id="table" name="table_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              @foreach ($tables as $table)
                <option value="{{ $table->id }}">{{ $table->name }}</option>
              @endforeach
            </select>
          </div>
          
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add Reservation</button>
        </form>
        
      </div>
    </div>
  </x-slot>
</x-admin-layout>
