@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-fuchsia-900 dark:text-fuchsia-900']) }}>
    {{ $value ?? $slot }}
</label>
