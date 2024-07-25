<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="home">Dashboard</x-nav-link>
<x-nav-link :href="route('client.list')" :active="request()->routeIs('client.*')" icon="users">Clientes</x-nav-link>
<x-nav-link :href="route('service.list')" :active="request()->routeIs('service.*')" icon="clipboard">Serviços</x-nav-link>
<x-nav-link :href="route('keyboard.index')" :active="request()->routeIs('keyboard.*')" icon="music-note">Aulas de teclado</x-nav-link>
<x-nav-link href="#" icon="device-mobile">Aplicativos</x-nav-link>
<x-nav-link href="#" icon="truck">Veículo</x-nav-link>
<x-nav-link href="#" icon="currency-dollar">Financeiro</x-nav-link>
