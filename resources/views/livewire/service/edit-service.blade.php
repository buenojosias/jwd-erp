<div>
    <x-ts-card title="Editar serviço">
        <form class="space-y-4" wire:submit="save">
            <x-ts-input label="Título" wire:model="title" />
            <x-ts-textarea label="Descrição" wire:model="description" />
            <div class="grid sm:grid-cols-2 sm:gap-4">
                <x-ts-select.native label="Status" wire:model="status">
                    <option value="">Selecione</option>
                    @foreach (App\Enums\ServiceStatusEnum::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->value }}</option>
                    @endforeach
                </x-native-select>
                <x-ts-inputs.currency label="Valor" prefix="R$" thousands="." decimal="," wire:model="amount" />
                <x-datetime-picker without-time without-tips label="Data da solicitação"
                    wire:model="requested_at" />
                <x-datetime-picker without-time without-tips label="Data de início" wire:model="start_date" />
                <x-datetime-picker without-time without-tips label="Prazo" wire:model="end_date" />
                <x-datetime-picker without-time without-tips label="Data de conclusão" wire:model="finished_at" />
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-ts-button flat label="Cancelar" x-on:click="close" />
                <x-ts-button type="submit" primary label="Salvar" wire:click="save" />
            </div>
        </x-slot>
    </x-card>
</div>
