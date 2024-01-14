<div class="grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2 lg:col-start-1">

        <x-card title="Detalhes do serviço">
            <x-slot name="action">
                <div>
                    <x-button sm icon="pencil" label="Editar" />
                    <x-button sm icon="plus" label="Etapa" />
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
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Etapas</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <x-icon name="check" class="h-5 w-5 text-gray-400" />
                                    <span class="ml-2 w-0 flex-1 truncate">resume_front_end_developer.pdf</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Download</a>
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <x-icon name="check" class="h-5 w-5 text-green-600" />
                                    <span class="ml-2 w-0 flex-1 truncate">coverletter_front_end_developer.pdf</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Download</a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </x-card>

    </div>

    <section class="lg:col-span-1 lg:col-start-3">
        <div class="bg-gray-50 rounded-lg shadow border border-gray-100">
            <div class="flex border-b p-4 items-end">
                <div class="font-bold flex-1">
                    <dt class="text-sm">Valor</dt>
                    <dd class="text-lg">R$ {{ $service->amount ?? 'Indefinido' }}</dd>
                </div>
                <div>
                    <x-badge primary label="{{ $service->status }}" />
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
</div>
