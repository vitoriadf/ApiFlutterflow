@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' =>' px-2 py-1 border-fuchsia-300 dark:border-fuchsia-200 dark:bg-fuchsia-100 dark:text-fuchsia-900 focus:border-fuchsia-500 dark:focus:border-fuchsia-600  focus:outline-none focus:ring-2  focus:ring-fuchsia-500  dark:focus:ring-fuchsia-600 rounded-md shadow-sm']) }}>
