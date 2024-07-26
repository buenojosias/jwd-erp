<div class="grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2 lg:col-start-1">
        @if (session('status'))
            <x-alert :label="session('status')" />
        @endif
        <x-card title="Detalhes do serviço">
            <x-slot name="action">
                <div>
                    <x-button sm icon="pencil" label="Editar" x-on:click="$openModal('editModal')" />
                    <x-button sm icon="plus" label="Etapa" x-on:click="$dispatch('open-step-modal')" />
                </div>
            </x-slot>
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Título</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $service->title }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Data da solicitação</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $service->requested_at->format('d/m/Y') }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Data de início</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $service->start_date ? $service->start_date->format('d/m/Y') : 'Não informada' }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Prazo</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $service->end_date ? $service->end_date->format('d/m/Y') : 'Não informado' }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Data de conclusão</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $service->finished_at ? $service->finished_at->format('d/m/Y') : 'Não informada' }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Detalhes</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $service->description ?? 'Sem descrição' }}
                    </dd>
                </div>
                <livewire:service.service-steps :service="$service" />
            </dl>
        </x-card>
    </div>

    <section class="lg:col-span-1 lg:col-start-3">
        <div class="bg-gray-50 rounded-lg shadow border border-gray-100" x-data="{ status: false }">
            <div class="flex border-b p-4 items-end">
                <div class="font-bold flex-1">
                    <dt class="text-sm">Valor</dt>
                    <dd class="text-lg">R$ {{ number_format($service->amount, 2, ',', '.') ?? '' }}</dd>
                </div>
                <div>
                    @php $color = $service->status->color() @endphp
                    <x-badge :$color label="{{ $service->status->value }}" class="cursor-pointer select-none"
                        x-on:dblclick="status = true" />
                </div>
            </div>
            <div class="border-b p-4 space-y-3 select-none" x-show="status">
                <x-native-select label="Alterar status" wire:model="status">
                    @foreach (App\Enums\ServiceStatusEnum::cases() as $item)
                        <option value="{{ $item->value }}">{{ $item->value }}</option>
                    @endforeach
                </x-native-select>
                <div class="flex justify-end gap-x-2" x-on:status-updated="status = false">
                    <x-button label="Cancelar" sm flat x-on:click="$wire.cancel; status = false" />
                    <x-button label="Salvar" sm primary x-on:click="$wire.changeStatus" />
                </div>
            </div>
            <div class="p-6 space-y-4 font-bold text-sm">
                <div class="flex items-center space-x-3">
                    <dt class="uo">
                        <x-icon name="user-circle" style="solid" class="text-gray-400 w-5 h-5" />
                    </dt>
                    <dd class="text-gray-700">{{ $service->client->name }}</dd>
                </div>
                <div class="flex items-center space-x-3">
                    <dt class="uo">
                        <x-icon name="calendar" class="text-gray-400 w-5 h-5" />
                    </dt>
                    <dd class="text-gray-500">{{ $service->requested_at->format('d M Y') }}</dd>
                </div>
                @if ($service->end_date)
                    <div class="flex items-center space-x-3">
                        <dt class="uo">
                            <x-icon name="hand" class="text-gray-400 w-5 h-5" />
                        </dt>
                        <dd class="text-gray-500">{{ $service->end_date->format('d M Y') }}</dd>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-modal name="editModal" x-on:service-updated="close" x-on:close="$dispatch('close')" persistent>
        <livewire:service.edit-service :$service />
    </x-modal>
</div>
