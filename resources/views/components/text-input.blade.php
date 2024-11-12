@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-fuchsia-300 dark:border-fuchsia-300 dark:bg-fuchsia-200 dark:text-gray-900 focus:border-fuchsia-500 dark:focus:border-fuchsia-600 focus:ring-fuchsia-500 dark:focus:ring-fuchsia-900 rounded-md shadow-sm']) }}>
