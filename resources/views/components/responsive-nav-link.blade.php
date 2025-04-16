@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-fuchsia-400 dark:border-fuchsia-600 text-start text-base font-medium text-fuchsia-700 dark:text-fuchsia-600 bg-fuchsia-50 dark:bg-fuchsia-300/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-300 focus:border-indigo-700 dark:focus:border-fuchsia-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-fchsia-600 dark:text-fuchsia-900 hover:text-fuchsia-800 dark:hover:text-fuchsia-300 hover:bg-gray-50 dark:hover:bg-fuchsia-700 hover:border-gray-300 dark:hover:border-fuchsia-600 focus:outline-none focus:text-fuchsia-800 dark:focus:text-fuchsia-200 focus:bg-gray-50 dark:focus:bg-fuchsia-400 focus:border-gray-300 dark:focus:border-fuchsia-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
