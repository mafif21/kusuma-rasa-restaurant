@props(['active'])

@php
$classesHome = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-semibold  leading-5 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white opacity-70 hover:opacity-100 transition duration-150 ease-in-out';

$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-semibold  leading-5 text-slate-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-slate-900 opacity-70 hover:opacity-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => request()->routeIs('home') ? $classesHome : $classes ]) }}>
    {{ $slot }}
</a>
