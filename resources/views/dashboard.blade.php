@seoTitle(__('Dashboard'))

<x-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
   <x-panel>
                <x-welcome />
                
    </x-panel>
</x-layout>