<div class="grid gap-y-4">
    @if (session('status'))
        <x-alert :label="session('status')" />
    @endif
    <div class="overflow-hidden rounded-lg bg-white shadow">
        <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
        <div class="bg-white p-6">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                    <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                        <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $client->name }}</p>
                        <p class="text-sm font-medium text-gray-600">{{ $client->reference }}</p>
                    </div>
                </div>
                <div class="mt-5 flex justify-center sm:mt-0">
                    <x-button label="Editar" x-on:click="$dispatch('load-client', { client: {{ $client }} }); $openModal('editModal')" />
                </div>
            </div>
        </div>
        <div
            class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">

            <div class="px-6 py-5 text-center text-sm font-medium">
                <span class="text-gray-900">12</span>
                <span class="text-gray-600">serviços contratados</span>
            </div>

            <div class="px-6 py-5 text-center text-sm font-medium">
                <span class="text-gray-900">4</span>
                <span class="text-gray-600">serviços pendentes</span>
            </div>

            <div class="px-6 py-5 text-center text-sm font-medium">
                <span class="text-gray-600">Saldo devedor:</span>
                <span class="text-gray-900">R$ 200,00</span>
            </div>
        </div>
    </div>

    <div x-data="{ detail: false }">
        <x-card title="Detalhes" padding="none">
            <x-slot name="action">
                <x-button flat icon="chevron-down" x-show="!detail" @click="detail = true" />
                <x-button flat icon="chevron-up" x-show="detail" @click="detail = false" />
            </x-slot>
            <dl class="detail" x-show="detail">
                <div>
                    <dt>Nome</dt>
                    <dd>{{ $client->name }}</dd>
                </div>
                <div>
                    <dt>Referência</dt>
                    <dd>{{ $client->reference }}</dd>
                </div>
                <div>
                    <dt>WhatsApp</dt>
                    <dd>{{ $client->whatsapp }}</dd>
                </div>
                <div>
                    <dt>Telefone</dt>
                    <dd>{{ $client->phone }}</dd>
                </div>
                <div>
                    <dt>E-mail</dt>
                    <dd>{{ $client->email }}</dd>
                </div>
                @if ($client->recommended_by)
                    <div>
                        <dt>Indicação</dt>
                        <dd>{{ $client->parent->name }}</dd>
                    </div>
                @endif
            </dl>
        </x-card>
    </div>

    <div x-data="{ services: false }">
        <x-card title="Serviços" padding="none" class="overflow-x-auto">
            <x-slot name="action">
                <div>
                    <x-button flat icon="plus" @click="$openModal('createServiceModal')" />
                    <x-button flat icon="chevron-down" x-show="!services"
                        @click="services = true; $wire.loadServices()" />
                    <x-button flat icon="chevron-up" x-show="services" @click="services = false" />
                </div>
            </x-slot>
            <div class="table-wrapper" x-show="services">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Título</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Valor</th>
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
                                <td>{{ $service->end_date ? $service->end_date->format('d/m/Y') : '' }}</td>
                                <td>{{ $service->status }}</td>
                                <td>R$ {{ number_format($service->amount, 2, ',', '.') ?? '' }}</td>
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

    <div x-data="{ receipts: false }">
        <x-card title="Pagamentos" padding="none" class="overflow-x-auto">
            <x-slot name="action">
                <div>
                    <x-button flat icon="plus" />
                    <x-button flat icon="chevron-down" x-show="!receipts"
                        @click="receipts = true; $wire.loadReceipts()" />
                    <x-button flat icon="chevron-up" x-show="receipts" @click="receipts = false" />
                </div>
            </x-slot>
            <div class="table-wrapper" x-show="receipts">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Transação</th>
                            <th scope="col">Observação</th>
                            <th scope="col" class="relative">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td>{{ $receipt->date->format('d/m/Y') }}</td>
                                <td>R$ {{ number_format($receipt->amount, 2, ',', '.') ?? '' }}</td>
                                <td>{{ $receipt->transaction_id }}</td>
                                <td>{{ $receipt->note }}</td>
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

    <x-modal name="editModal" x-on:open="$dispatch('load-indications')" x-on:client-updated="close" persistent>
        <livewire:client.edit-client :client="$client" />
    </x-modal>

    <x-modal name="createServiceModal" x-on:service-created="close" x-on:close="$dispatch('close')" x-on:open="$dispatch('load-clients')" persistent>
        {{-- Remover x-on-open --}}
        <livewire:service.create-service :client="$client" />
    </x-modal>

</div>
