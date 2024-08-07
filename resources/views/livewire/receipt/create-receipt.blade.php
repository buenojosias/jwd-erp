<div>
    <x-card title="Lançar pagamento" max-size="xs">
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
            <div class="space-y-4">
                <x-datetime-picker without-time without-tips label="Data" wire:model="date"
                    max="{{ now()->format('Y-m-d') }}" />
                <x-inputs.currency label="Valor" prefix="R$" thousands="." decimal="," wire:model="amount" />
                <x-native-select label="Carteira" wire:model="wallet_id" required>
                    @if ($wallets)
                        <option value="">Selecione</option>
                        @foreach ($wallets as $wallet)
                            <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                        @endforeach
                    @else
                        <option value="">Carregando carteiras</option>
                    @endif
                </x-native-select>
                <x-textarea label="Observação" wire:model="note" />
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
