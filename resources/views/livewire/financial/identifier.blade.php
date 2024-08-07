<div>
    <x-card title="Identificadores" padding="none" class="divide-y">
        <x-slot:action>
            <x-button icon="plus" x-on:click="$openModal('createModal')" sm flat />
        </x-slot>
        @foreach ($identifiers as $identifier)
            <div class="flex justify-between items-center px-4 py-2 text-sm">
                <div>{{ $identifier->title }}</div>
                <div>
                    <x-dropdown>
                        <x-dropdown.item label="Ver movimentações" icon="chart-bar" />
                        <x-dropdown.item label="Editar" icon="pencil" wire:click="loadIdentifier({{ $identifier->id }})" />
                        <x-dropdown.item label="Excluir" icon="trash" separator />
                    </x-dropdown>
                </div>
            </div>
        @endforeach
    </x-card>

    <x-modal name="createModal" wire:model="modal" x-on:close="$wire.clear()" max-width="sm">
        <x-card title="Adicionar identificador">
            <form class="space-y-4">
                <x-input label="Título" wire:model="title" />
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
