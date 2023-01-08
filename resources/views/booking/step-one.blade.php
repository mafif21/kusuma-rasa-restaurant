<x-app-layout>
  <x-slot name="title">Menu</x-slot>

  <x-container>
      <div class="grid lg:grid-cols-2 shadow-lg rounded">
        <div>
          <img class="object-cover w-full h-full" src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
        </div>

        <div class="p-10">
          <div>
            <h1 class="text-2xl font-semibold mb-2">Make Reservation</h1>

            <div class="w-full bg-gray-200 rounded-full">
              <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-1.5 leading-none rounded-full" style="width: 45%">Step 1</div>
            </div>

            <form class="mt-5" method="post" action="{{ route('booking.store.step.one') }}">
              @csrf
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                  <div>
                      <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                      <input type="text" id="First name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="First name" value="{{ old('first_name', $reservation->first_name ?? '') }}">
                      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                  </div>
                  <div>
                      <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                      <input type="text" id="Last name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Last name" value="{{ old('last_name', $reservation->first_name ?? '') }}" >
                      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                  </div>
              </div>

              <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email Address" value="{{ old('email', $reservation->email ?? '') }}" >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+62" value="{{ old('phone',  $reservation->phone ?? '') }}" >
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
              </div>

              <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                <input  type="datetime-local" id="date" min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                max="{{ $max_date->format('Y-m-d\TH:i:s') }}" name="res_date" value="{{ old('res_date', $reservation->res_date ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email Address" >
                <x-input-error :messages="$errors->get('res_date')" class="mt-2" />
              </div>

              <div class="mb-6">
                <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900">Person</label>
                <input type="text" id="guest_number" name="guest_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Guest number" value="{{ old('guest_number', $reservation->guest_number ?? '') }}" >
                <x-input-error :messages="$errors->get('guest_number')" class="mt-2" />
              </div>

              <div class="flex justify-end">
                <button type="submit" class="bg-red-500 py-2 px-6 text-white rounded">Next</button>
              </div>
            </form>

      
        </div>
      </div>
  </x-container>
</x-app-layout>
