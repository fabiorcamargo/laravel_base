<x-layout>
    <x-slot name="header">
        {{-- __('Home') --}}
    </x-slot>
    <x-banner1 />
    <x-post-list />
    <x-panel>
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to your Splade application!
        </div>
        <Link slideover href="/docs">Home</Link>
       
        
    </x-panel>
</x-layout>