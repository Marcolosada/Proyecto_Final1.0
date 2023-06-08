<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#dbd200] leading-tight text-Tangerine">
            {{ __('EL MANUAL DE SUPERVIVENCIA DE ISC') }}
        </h2>
    </x-slot>
    @livewireStyles
    <div class="py-12">
        <div class="py-12">
            <div class="container ">
                @livewire('user-pagination')
            </div>
        </div>
    </div>
</x-app-layout>