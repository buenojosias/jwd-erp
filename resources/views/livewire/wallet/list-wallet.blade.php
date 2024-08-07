<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Carteiras</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Adicionar carteira" x-on:click="$openModal('createModal')" />
            </div>
        </div>
    </x-slot>
    <div class="py-4">
        <x-card title="Carteiras" padding="none" class="overflow-x-auto">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Saldo</th>
                            <th width="110"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wallets as $wallet)
                            <tr>
                                <td>{{ $wallet->name }}</td>
                                <td>R$ {{ number_format($wallet->balance, 2, ',', '.') }}</td>
                                <td>
                                    <x-button icon="pencil" wire:click="loadWallet({{$wallet->id}})" sm flat />
                                    <x-button icon="chart-bar" x-on:click="$emit('deleteWallet', {{ $wallet->id }})" sm flat />
                                </td>
                            </tr>
                        @endforeach
                </table>
        </x-card>
    </div>

    <x-modal name="createModal" wire:model="modal" x-on:close="$wire.clear()" max-width="sm">
        <x-card title="Adicionar cateira">
            <form class="space-y-4">
                <x-input label="Nome" wire:model="name" />
                <x-inputs.currency label="Saldo" prefix="R$" thousands="." decimal="," wire:model="balance" />
                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancelar" x-on:click="close" />
                        <x-button type="submit" primary label="Salvar" wire:click="submit" />
                    </div>
                </x-slot>
            </form>
        </x-card>
    </x-modal>
</div>
