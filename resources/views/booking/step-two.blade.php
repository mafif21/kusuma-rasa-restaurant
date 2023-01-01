<x-app-layout>
  <x-slot name="title">Menu</x-slot>

  <x-container>
      <div class="grid grid-cols-2 shadow-lg rounded">
        <div>
          <img class="object-cover w-full h-full" src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
        </div>

        <div class="p-10">
          <div>
            <h1 class="text-2xl font-semibold mb-2">Make Reservation</h1>

            <div class="w-full bg-gray-200 rounded-full">
              <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-1.5 leading-none rounded-full" style="width: 100%">Step 2</div>
            </div>

            <form class="mt-5" method="post" action="{{ route('booking.store.step.two') }}">
              @csrf
              <div class="mb-6">
                <label for="table" class="block mb-2 text-sm font-medium text-gray-900">Table</label>
                <select id="table" name="table_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  @foreach ($tables as $table)    
                    <option value="{{ $table->id }}">{{ $table->name }} ( {{ $table->guest_number }} Person )</option>
                  @endforeach
                </select>
              </div>

              <div class="flex justify-between">
                <a href="{{ route('booking.step.one') }}" type="submit" class="bg-red-500 py-2 px-6 text-white rounded">Previous</a>
                <button type="submit" class="bg-red-500 py-2 px-6 text-white rounded">Booking Now</button>
              </div>
            </form>

          </form>
        </div>
      </div>
  </x-container>
</x-app-layout>
