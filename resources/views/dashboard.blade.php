<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </x-slot>

    <div class="py-4">
        @dump(auth()->user()->name)
    </div>
</x-app-layout>
