<div>
    <x-card title="Editar cliente">
        <form class="space-y-4">
            <x-input label="Nome" placeholder="Carregando..." wire:model="name" />
            <div class="grid sm:grid-cols-2 sm:gap-4">
                <x-input label="WhatsApp" wire:model="whatsapp" />
                <x-input label="Telefone" wire:model="phone" />
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
</div>
