<h3 {{ $attributes->merge(['class' => 'font-bold text-2xl tracking-tight text-gray-900']) }}>
    {{ $value ?? $slot }}
</h3>