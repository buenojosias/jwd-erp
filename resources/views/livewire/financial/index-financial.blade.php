<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Financeiro</h1>
            </div>
            {{-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Adicionar cliente" x-on:click="$openModal('createModal')" />
            </div> --}}
        </div>
    </x-slot>
    <div class="py-4">
        <div class="mb-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <x-card class="stats">
                <div class="data">
                    <div class="label">Saldo atual</div>
                    <div class="value">R$ {{ number_format($balance, 2, ',', '.') }}</div>
                </div>
                <div class="actions">
                    sdd
                </div>
            </x-card>
            <x-card class="stats">
                <div class="data">
                    <div class="label">Carteiras</div>
                    <div class="value">{{ $wallets }}</div>
                </div>
                <div class="actions">
                    <a href="{{ route('financial.wallet.index') }}" wire:navigate>
                        <x-icon name="chevron-right" class="w-5 h-5" />
                    </a>
                </div>
            </x-card>
            <x-card class="stats">
                <div class="data">
                    <div class="label">Faturas pendentes</div>
                    <div class="value">{{ $invoices }}</div>
                </div>
                <div class="actions">
                    sdd
                </div>
            </x-card>
            <x-card class="stats">
                <div class="data">
                    <div class="label">Valores a receber</div>
                    <div class="value">R$ {{ number_format($receivables, 2, ',', '.') }}</div>
                </div>
                <div class="actions">
                    sdd
                </div>
            </x-card>
        </div>

        <div class="grid sm:grid-cols-3 gap-4">
            <div class="sm:col-span-2">
                asdf
            </div>
            <div>
                <livewire:financial.identifier />
            </div>
        </div>

    </div>
</div>
