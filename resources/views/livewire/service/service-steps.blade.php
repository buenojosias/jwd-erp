<div class="sm:col-span-2">
    <dt class="text-sm font-medium text-gray-500">Etapas</dt>
    <dd class="mt-1 text-sm text-gray-900">
        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
            @forelse ($steps as $step)
                <li class="space-y-3">
                    <div class="flex p-3 items-center justify-between text-sm bg-gray-100">
                        <div class="flex w-0 basis-1/2 items-center">
                            <x-icon name="check" :class="$step->status->value === 'concluído' ? 'text-green-600 h-5 w-5' : 'text-gray-500 h-5 w-5'" />
                            <span class="ml-2 w-0 flex-1 truncate">{{ $step->title }}</span>
                        </div>
                        <div class="basis-1/4">
                            <span class="mr-2">{{ $step->status->name }}</span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <x-button icon="chevron-down" sm flat />
                        </div>
                    </div>
                    <div class="flex p-3 space-x-2">
                        <div class="flex-1 flex">
                            <div class="basis-2/6">
                                Início: {{ $step->start_date ? $step->start_date->format('d/m/Y') : '' }}<br />
                                Conclusão: {{ $step->end_date ? $step->end_date->format('d/m/Y') : '' }}<br />
                                Status: {{ $step->status->name }}
                                {{-- {!! $step !!} --}}
                            </div>
                            <div class="basis-3/6">
                                <p>{{ $step->description }}</p>
                            </div>
                        </div>
                        <div class="flex-0  space-x-2">
                            <x-dropdown>
                                <x-dropdown.item label="Editar" icon="pencil" />
                                <x-dropdown.item label="Remover" icon="trash" wire:click="delete({{ $step->id }})"
                                    wire:confirm="Remover esta etapa?" />
                            </x-dropdown>
                        </div>
                    </div>
                </li>
            @empty
                <div class="p-4 text-center">Nenhuma etapa adicionada.</div>
            @endforelse
        </ul>
    </dd>
</div>
