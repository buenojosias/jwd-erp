<div>
    <x-card title="{{ $step ? 'Editar' : 'Adicionar' }} etapa" class="w-full">
        <div class="flex flex-col gap-y-4">
            <x-input label="Título" wire:model="title" />
            <x-textarea label="Descrição" wire:model="description" />
            <x-native-select label="Status" wire:model="status">
                <option value="">Selecione</option>
                @foreach (App\Enums\StepStatusEnum::cases() as $item)
                    <option value="{{ $item->value }}">{{ $item->value }}</option>
                @endforeach
            </x-native-select>
            <x-datetime-picker without-time without-tips label="Data de início" wire:model="start_date" />
            <x-datetime-picker without-time without-tips label="Data de conclusão" wire:model="end_date" />
        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancelar" x-on:click="close" />
                <x-button type="submit" primary label="Salvar" wire:click="save" />
            </div>
        </x-slot>
    </x-card>
</div>
