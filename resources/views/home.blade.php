<x-app-layout>
    <x-slot name="title">Home</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
            
            {{ auth()->check() }}
        </h2>
    </x-slot>
</x-app-layout>
