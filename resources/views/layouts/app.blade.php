<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gestão JWD') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style> [x-cloak] { display: none; } </style>
    @livewireStyles
    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-FxouFsPn.css') }}">
    <script src="{{ asset('build/assets/app-0UyXd1MH.js') }}" defer></script>
</head>

<body class="h-full font-sans antialiased bg-gray-100">
    <div class="min-h-[640px] bg-gray-100">
        <div x-data="{ open: false }" @keydown.window.escape="open = false">
            <div x-show="open" class="relative z-40 md:hidden"
                x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
                aria-modal="true">
                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."
                    class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
                <div class="fixed inset-0 z-40 flex">
                    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300 transform"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                        x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                        class="relative flex w-full max-w-xs flex-1 flex-col bg-sky-700" @click.away="open = false">

                        <div x-show="open" x-transition:enter="ease-in-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-description="Close button, show/hide based on off-canvas menu state."
                            class="absolute top-0 right-0 -mr-12 pt-2">
                            <button type="button"
                                class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                @click="open = false">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x-mark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="h-0 flex-1 overflow-y-auto pt-5 pb-4">
                            <div class="flex flex-shrink-0 items-center px-4">
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=sky&amp;shade=300"
                                    alt="Gestão JWD">
                            </div>
                            <nav class="mt-5 space-y-1 px-2">
                                @include('components.navigation')
                            </nav>
                        </div>
                        <div class="flex flex-shrink-0 border-t border-sky-800 p-4">
                            <a href="#" class="group block flex-shrink-0">
                                <div class="flex items-center">
                                    <div>
                                        <img class="inline-block h-10 w-10 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                            alt="">
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-base font-medium text-white">{{ auth()->user()->name }}</p>
                                        <p class="text-sm font-medium text-indigo-200 group-hover:text-white">View
                                            profile</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                        <!-- Force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex min-h-0 flex-1 flex-col bg-sky-700">
                    <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
                        <div class="flex flex-shrink-0 items-center px-4">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=300"
                                alt="Gestão JWD">
                        </div>
                        <nav class="mt-5 flex-1 space-y-1 px-2">
                            @include('components.navigation')
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 border-t border-sky-800 p-4">
                        <a href="#" class="group block w-full flex-shrink-0">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-9 w-9 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                        alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                                    <p class="text-xs font-medium text-indigo-200 group-hover:text-white">View profile
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 flex-col md:pl-64">
                <div class="sticky top-0 z-10 bg-gray-100 pl-1 pt-1 sm:pl-3 sm:pt-3 md:hidden">
                    <button type="button"
                        class="-ml-0.5 -mt-0.5 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bars-3"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>
                </div>
                <main class="flex-1">
                    <div class="py-6">
                        @if (isset($header))
                            <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                                {{ $header }}
                            </div>
                        @endif
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </div>

    {{-- <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}
    @livewireScripts
</body>

</html>
