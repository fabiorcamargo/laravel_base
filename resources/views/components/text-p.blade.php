@props(['value'])
    <p {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
        {{ $value ?? $slot }}
    </p>