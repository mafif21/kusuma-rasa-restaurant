<x-admin-layout>
    <x-slot name="title">Admin</x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Hi Welcome back {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
