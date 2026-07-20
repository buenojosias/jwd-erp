<div>
    <x-ts-card title="Editar cliente">
        <form class="space-y-4">
            <x-ts-input label="Nome" placeholder="Carregando..." wire:model="name" />
            <div class="grid sm:grid-cols-2 sm:gap-4">
                <x-ts-input label="WhatsApp" wire:model="whatsapp" />
                <x-ts-input label="Telefone" wire:model="phone" />
            </div>
            <x-ts-input label="E-mail" wire:model="email" />
            <div class="grid sm:grid-cols-2 sm:gap-4">
                <x-ts-input label="Referência" wire:model="reference" />
                @if ($indications)
                    <x-ts-select.native label="Indicado(a) por:" wire:model="recommended_by">
                        <option value="">Selecione</option>
                        @foreach ($indications as $indication)
                            <option value="{{ $indication->id }}">{{ $indication->name }}
                            </option>
                        @endforeach
                    </x-native-select>
                @else
                    <x-ts-select.native label="Indicado(a) por:">
                        <option value="">Carregando lista...</option>
                    </x-native-select>
                @endif
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-ts-button flat text="Cancelar" x-on:click="close" />
                    <x-ts-button type="submit" primary label="Salvar" wire:click="submit" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
