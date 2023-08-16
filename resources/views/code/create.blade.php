@seoTitle(__('Criar Código'))

<x-layout>
    <x-slot:header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Código') }}
        </h2>
        </x-slot>

        <x-panel>
            
            <x-text class="font-bold" size="1" text="Criar Código"></x-text>
            <x-splade-form :for="$form" />

        </x-panel>
</x-layout>