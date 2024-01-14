<div>
    <x-card title="Novo serviço">
        <form class="space-y-4" wire:submit="save">
            @if (!$client)
                <x-native-select label="Cliente" wire:model="client_id" required>
                    @if ($clients)
                    <option value="">Selecione</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    @else
                        <option value="">Carregando clientes</option>
                    @endif
                </x-native-select>
            @endif
            <x-input label="Título" wire:model="title" />
            <x-textarea label="Descrição" wire:model="description" />
            <div class="grid sm:grid-cols-2 sm:gap-4">
                <x-native-select label="Status" wire:model="status">
                    <option value="">Selecione</option>
                    @foreach (App\Enums\ServiceStatus::cases() as $status)
                        <option value="{{ $status->name }}">{{ $status->value }}</option>
                    @endforeach
                    {{-- <option value="Analisando">Analisando</option>
                    <option value="Aguardando">Aguardando</option>
                    <option value="Em execução">Em execução</option>
                    <option value="Em aprovação">Em aprovação</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Atrasado">Atrasado</option> --}}
                </x-native-select>
                <x-inputs.currency label="Valor" prefix="R$" thousands="." decimal="," wire:model="amount" />
                <x-datetime-picker without-time without-tips label="Data da solicitação"
                    wire:model.defer="requested_at" />
                <x-datetime-picker without-time without-tips label="Data de início" wire:model.defer="start_date" />
                <x-datetime-picker without-time without-tips label="Prazo" wire:model.defer="end_date" />
                <x-datetime-picker without-time without-tips label="Data de conclusão" wire:model.defer="finished_at" />
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancelar" x-on:click="close" />
                <x-button type="submit" primary label="Salvar" wire:click="save" />
            </div>
        </x-slot>
    </x-card>
</div>
