<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Valores a receber</h1>
            </div>
        </div>
    </x-slot>
    <div class="py-4">
        <x-card title="Valores a receber" padding="none" class="overflow-x-auto">
            <x-slot name="action">
                <x-toggle label="Apenas serviços concluídos" wire:model.live="onlyFinished" />
            </x-slot>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Serviços</th>
                            <th scope="col">Pagamentos</th>
                            <th scope="col">Pendente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>
                                    <a href="{{ route('client.show', $client) }}" wire:navigate>{{ $client->name }}</a>
                                </td>
                                <td>R$ {{ number_format($client->total_services, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($client->total_receipts, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($client->amount_due, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-slot name="footer">
                {{-- {{ $clients->links() }} --}}
            </x-slot>
        </x-card>
    </div>
</div>
