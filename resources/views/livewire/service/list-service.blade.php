<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Serviços</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Novo serviço" @click="$openModal('createModal')" />
            </div>
        </div>
    </x-slot>
    <div class="py-4">
        <x-card title="Serviços" padding="none" class="overflow-x-auto">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Título</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="relative">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->requested_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('service.show', $service) }}" wire:navigate>
                                        {{ $service->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('client.show', $service->client) }}" wire:navigate>
                                        {{ $service->client->name }}
                                    </a>
                                </td>
                                <td>{{ $service->end_date ? $service->end_date->format('d/m/Y') : '' }}</td>
                                <td>{{ $service->status }}</td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#">
                                        <x-button rounded sm icon="pencil" flat gray hover:outline.negative
                                            focus:solid.positive />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>

    <x-modal name="createModal" x-on:service-created="close" x-on:close="$dispatch('close')" x-on:open="$dispatch('load-clients')" persistent>
        <livewire:service.create-service />
    </x-modal>
</div>
