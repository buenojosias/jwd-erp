<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gestão JWD') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <tallstackui:script />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased"
          x-cloak
          x-data="{ name: @js(auth()->user()->name) }"
          x-on:name-updated.window="name = $event.detail.name"
          x-bind:class="{ 'dark bg-gray-800': darkTheme, 'bg-gray-100': !darkTheme }">
    <x-ts-layout>
        <x-slot:top>
            <x-ts-dialog />
            <x-ts-toast />
        </x-slot:top>
        <x-slot:header>
            <x-ts-layout.header>
                <x-slot:right>
                    <x-ts-dropdown>
                        <x-slot:action>
                            <div>
                                <button class="cursor-pointer" x-on:click="show = !show">
                                    <span class="text-base font-semibold text-primary-500" x-text="name"></span>
                                </button>
                            </div>
                        </x-slot:action>
                        <x-slot:header>
                            <x-ts-theme-switch block />
                        </x-slot:header>
                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-ts-dropdown.items :text="__('Profile')" :href="route('user.profile')" />
                            <x-ts-dropdown.items :text="__('Logout')" onclick="event.preventDefault(); this.closest('form').submit();" separator />
                        </form> --}}
                    </x-ts-dropdown>
                </x-slot:right>
            </x-ts-layout.header>
        </x-slot:header>
        <x-slot:menu>
            <x-ts-side-bar smart collapsible>
                <x-slot:brand>
                    <div class="my-4 flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" width="40" height="40" />
                    </div>
                </x-slot:brand>
                <x-slot:brand-collapsed>
                    <div class="my-4 flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" width="20" height="20" />
                    </div>
                </x-slot:brand-collapsed>
                <x-ts-side-bar.item text="Dashboard" icon="home" :route="route('dashboard')" />
                <x-ts-side-bar.item text="Agenda" icon="calendar" :route="route('appointment.list')" />
                <x-ts-side-bar.item text="Clientes" icon="users" :route="route('client.list')" />
                <x-ts-side-bar.item text="Serviços" icon="clipboard" :route="route('service.list')" />
                <x-ts-side-bar.item text="Aulas de teclado" icon="musical-note" :route="route('keyboard.index')" />
                <x-ts-side-bar.item text="Aplicativos" icon="device-phone-mobile" />
                <x-ts-side-bar.item text="Veículo" icon="truck" />
                <x-ts-side-bar.item text="Financeiro" icon="currency-dollar" :route="route('financial.index')" />
            </x-ts-side-bar>
        </x-slot:menu>
        {{ $slot }}
    </x-ts-layout>
    @livewireScripts
    </body>
</html>