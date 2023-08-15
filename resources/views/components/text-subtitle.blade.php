<h3 {{ $attributes->merge(['class' => 'text-base tracking-tight text-gray-900']) }}>
    {{ $value ?? $slot }}
</h3>