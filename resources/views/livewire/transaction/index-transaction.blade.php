<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Extrato de movimentações</h1>
            </div>
            {{-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Adicionar cliente" x-on:click="$openModal('createModal')" />
            </div> --}}
        </div>
    </x-slot>

    <div class="py-4">
        <x-card title="Movimentações" padding="none" class="overflow-x-auto">
            <x-slot name="action">
                <div class="w-24 flex gap-2">
                    <x-native-select wire:model.live="perPage" :options="[5, 10, 20, 50, 100]" />
                    <x-button icon="filter" x-on:click="$openModal('filterModal')" flat xs />
                </div>
            </x-slot>
            <div class="table-wraper">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Carteira</th>
                            <th scope="col">Identificador</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->date->format('d/m/Y') }}</td>
                                <td>{{ $transaction->description }}</td>
                                <td>{{ $transaction->wallet->name }}</td>
                                <td>{{ $transaction->identifier->title }}</td>
                                <td @class(['text-red-800' => $transaction->amount < 0])>
                                    <div class="flex justify-between">
                                        <span>R$</span>
                                        <span>{{ number_format($transaction->amount, 2, ',', '.') }}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-slot name="footer">
                {{ $transactions->links() }}
            </x-slot>
        </x-card>
    </div>

    <x-modal id="filterModal" wire:model="filterModal" max-width="md" x-on:open="$wire.modalOpened()">
        <x-card title="Filtrar movimentações">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <x-datetime-picker label="Data inicial" wire:model.live="startDate" without-time />
                <x-datetime-picker label="Data inicial" wire:model.live="endDate" without-time />
                <x-native-select label="Carteira" wire:model.live="walletId" placeholder="Selecione uma carteira"
                    :options="$wallets" option-label="name" option-value="id" />
                <x-native-select label="Identificador" wire:model.live="identifierId"
                    placeholder="Selecione um identificador" :options="$identifiers" option-label="title" option-value="id" />
                <div class="sm:col-span-2 grid sm:grid-cols-4 gap-2">
                    <x-label label="Fluxo" />
                    <x-radio label="Tudo" id="size-sm" wire:model.live="flux" value="" sm />
                    <x-radio label="Entradas" id="size-sm" wire:model.live="flux" value="in" sm />
                    <x-radio label="Saídas" id="size-sm" wire:model.live="flux" value="out" sm />
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-2">
                    <x-button wire:click="resetFilter" label="Limpar filtros" />
                    <x-button x-on:click="close" label="Fechar" flat />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
