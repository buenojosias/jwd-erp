<div>
    <x-slot name="header">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1>Agenda</h1>
            </div>
            {{-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button primary label="Adicionar cliente" x-on:click="$openModal('createModal')" />
            </div> --}}
        </div>
    </x-slot>
    <div class="py-4 grid lg:grid-cols-5 gap-6">
        <div class="col-span-5 lg:col-span-3 space-y-4">
            <x-card padding="none">
                <div class="mb-1 py-2 md:px-3 flex border-b">
                    <div>
                        <x-button wire:click="goToPreviusMonth" flat icon="chevron-left" />
                    </div>
                    <div class="pt-1 grow text-center font-semibold text-gray-800">
                        {{ \App\Enums\MonthEnum::from($selectedMonth)->label() }}/{{ $selectedYear }}</div>
                    <div>
                        <x-button wire:click="goToNextMonth" flat icon="chevron-right" />
                    </div>
                </div>
                <div class="flex py-0.5">
                    @foreach ($weekDays as $weekday)
                        <div class="basis-1/7 px-2 py-1 text-center text-sm font-semibold">{{ $weekday->abbr() }}</div>
                    @endforeach
                </div>
                <div class="flex flex-wrap divide-y">
                    @for ($i = 0; $i < $firstWeekdayOfMonth; $i++)
                        <div class="basis-1/7 border-t"></div>
                    @endfor
                    @for ($i = 1; $i <= $daysInMonth; $i++)
                        @php
                            $day_events = $appointments->where('day', $i)->where('month', $selectedMonth);
                        @endphp
                        <div class="basis-1/7 h-12 flex items-center justify-center border-t">
                            <div
                                class="w-8 h-8 flex items-center justify-center rounded text-sm
                                {{ date($selectedYear . '-' . substr("00{$selectedMonth}", -2) . '-' . substr("00{$i}", -2)) == date('Y-m-d') && $day_events->count() == 0 ? 'text-sky-600 font-semibold' : '' }}
                                {{ $day_events->count() > 0 ? 'bg-sky-400 text-white font-semibold' : 'cursor-default' }}
                            ">
                                {{ $i }}
                            </div>
                        </div>
                    @endfor
                    @for ($i = 1; $i <= $remainder; $i++)
                        <div class="basis-1/7 "></div>
                    @endfor
                </div>
            </x-card>
        </div>
        <div class="col-span-5 lg:col-span-2 space-y-2">
            @forelse ($appointments as $appointment)
                <div class="flex gap-3 p-2 rounded bg-white hover:bg-gray-100 shadow">
                    <div
                        class="w-8 py-1 rounded bg-secondary-400 flex flex-col justify-center items-center text-gray-100">
                        <span class="text-sm">{{ $appointment->day }}</span>
                        <span
                            class="text-xs uppercase">{{ \App\Enums\MonthEnum::from($appointment->date->format('m'))->abbr() }}</span>
                    </div>
                    <div class="flex-auto flex flex-col justify-center text-sm">
                        <a href="{{ route('panel.events.show', $appointment) }}">
                            <h4 class="font-semibold text-gray-800">
                                {{ $appointment->name }}
                            </h4>
                            @if ($appointment->choir_id != $choirId)
                                <p class="text-xs">{{ $appointment->choir->name }}</p>
                            @endif
                            @if ($confirmable)
                                <p class="text-xs">{{ $appointment->choristers_count }}
                                    {{ $appointment->choristers_count < 2 ? 'coralista confirmado' : 'coralistas confirmados' }}
                                </p>
                            @endif
                        </a>
                    </div>
                </div>
            @empty
                <x-card>
                    <div class="text-center text-gray-500 text-sm font-semibold">
                        <p>Nenhum evento agendado
                            {{ $changed ? 'para o mês selecionado.' : 'para as próximas datas.' }} Clique no botão
                            acima para agendar um evento.</p>
                    </div>
                </x-card>
            @endforelse
        </div>
    </div>
</div>
