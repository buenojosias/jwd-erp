<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Clientes</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Adicionar cliente" x-on:click="$openModal('createModal')" />
            </div>
        </div>
    </x-slot>
    @if (session('status'))
        <x-alert :label="session('status')" />
    @endif
    <div class="py-4">
        <x-card title="Clientes" padding="none" class="overflow-x-auto">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">WhatsApp</th>
                            <th scope="col">Referência</th>
                            <th scope="col">Indicação</th>
                            <th scope="col" class="relative">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>
                                    <a href="{{ route('client.show', $client) }}" wire:navigate>
                                        {{ $client->name }}
                                    </a>
                                </td>
                                <td>{{ $client->whatsapp }}</td>
                                <td>{{ $client->reference }}</td>
                                <td>{{ $client->parent->name ?? '' }}</td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <x-button rounded sm icon="pencil"
                                    x-on:click="$dispatch('load-client', { client: {{ $client }} }); $openModal('editModal')"
                                        flat gray />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-slot name="footer">
                {{ $clients->links() }}
            </x-slot>
        </x-card>
    </div>
    <x-modal name="createModal" x-on:open="$wire.loadIndications" x-on:close="$wire.clear" persistent>
        <x-card title="Adicionar cliente">
            <form class="space-y-4">
                <x-input label="Nome" wire:model="name" />
                <div class="grid sm:grid-cols-2 sm:gap-4">
                    <x-input x-mask="(99) 99999-9999" label="WhatsApp" wire:model="whatsapp" />
                    <x-input x-mask="(99) 9999-9999" label="Telefone" wire:model="phone" />
                </div>
                <x-input label="E-mail" wire:model="email" />
                <div class="grid sm:grid-cols-2 sm:gap-4">
                    <x-input label="Referência" wire:model="reference" />
                    <x-native-select label="Indicado(a) por:" wire:model="recommended_by">
                        <option value="">Selecione</option>
                        @foreach ($indications as $indication)
                            <option value="{{ $indication->id }}">{{ $indication->name }}</option>
                        @endforeach
                    </x-native-select>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancelar" x-on:click="close" />
                        <x-button type="submit" primary label="Salvar" wire:click="submit" />
                    </div>
                </x-slot>
            </form>
        </x-card>
    </x-modal>

    <x-modal name="editModal" x-on:client-updated="close" x-on:close="$dispatch('close')" persistent>
        <livewire:client.edit-client :client="$client" />
    </x-modal>
</div>
