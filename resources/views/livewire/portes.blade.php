<div>
    <div>
        <div class="text-xs text-gray-600 uppercase border-b border-gray-400 text-center mb-3 py-2">Destino del bulto
        </div>
        @isset($provincias)
            <select wire:model="prov" name="provincia" id="provincia"
                class="border border-green-500 rounded px-5 py-2 w-full mb-4">
                <option value="" default>Selecciona Provincia</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                @endforeach
            </select>
        @endisset
    </div>

    <div class="text-xs text-gray-600 uppercase border-b border-gray-400 text-center mb-3 py-2">Peso y medidas</div>

    <div class="flex mb-5 text-center">
        <label for="peso">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
            </svg> Peso
            <input type="number" wire:model="peso" name="peso" id="peso" placeholder="0"
                class="border rounded px-3 py-1 my-1 w-20">
        </label>
        <label for="largo">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
            Largo
            <input type="number" wire:model="largo" name="largo" id="largo" placeholder="0"
                class="border rounded px-3 py-1 my-1 w-20">
        </label>
        <label for="ancho">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
            Ancho
            <input type="number" wire:model="ancho" name="ancho" id="ancho" placeholder="0"
                class="border rounded px-3 py-1 my-1 w-20">
        </label>
        <label for="alto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
            </svg>
            Alto
            <input type="number" wire:model="alto" name="alto" id="alto" placeholder="0"
                class="border rounded px-3 py-1 my-1 w-20">
        </label>
    </div>


    {{-- <div>Peso {{ $peso }} - Largo {{ $largo }} - Alto {{ $alto }} - Ancho {{ $ancho }} -
        Peso Volumetrico: {{ isset($resultados) ? $resultados->first()->pesoVolumetrico : '0' }} Kg - ratio
        ({{ isset($resultados) ? $resultados->first()->agencia->volumetrico : '0' }} Kg/m3)
    </div> --}}

    @isset($resultados)
        @if ($resultados->isEmpty())
            <b>Sin Resultados</b>
        @else
            <div class="border px-3 py-2 rounded bg-green-500 text-center text-xl m-2">
                <b>Mejor Tarifa: </b> <span
                    class="text-white font-bold text-2xl">{{ $resultados->first()->importe }}€</span> por
                <b>{{ $resultados->first()->agencia->nombre }}</b>

                {!! $resultados->first()->volumetrico ? '<br><span class="text-sm font-normal">(Peso Volumétrico ' . $resultados->first()->pesoVolumetrico . ' Kg)</span>' : '' !!}
            </div>
            @if ($resultados->count() > 1)
                <div class="text-xs text-gray-600 uppercase border-b border-gray-400 text-center py-2">Otros resultados
                    encontrados</div>
                <ul>
                    @foreach ($resultados->slice(1) as $resultado)
                        <li key="{{ $resultado->id }}"
                            class="py-2 border-dashed border-b border-px border-gray-400 text-sm text-center">
                            {{ $resultado->agencia->nombre }}: {{ $resultado->importe }}€
                            {{ $resultado->volumetrico ? '(Peso Volumétrico ' . $resultado->pesoVolumetrico . ' Kg)' : '' }}
                        </li>
                        {{-- <li key="{{ $resultado->id }}">{{ $resultado->id }} - Agencia:
                            {{ $resultado->agencia->nombre }}

                            - Zona: {{ $resultado->zona->numero }}
                            - Provincias:
                            @foreach ($resultado->zona->provincia as $provincia)
                                {{ $provincia->nombre }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                            - Peso: {{ $resultado->peso->tramo_peso }} Kg
                            - Medidas : {{ $resultado->medida->ancho }} x {{ $resultado->medida->largo }} x
                            {{ $resultado->medida->alto }}
                            - Tarifa: {{ $resultado->tarifa_total }}
                            - Tarifa x Peso: {{ $resultado->tarifa_por_kg }}
                            - Ratio Volumetrico: {{ $resultado->ratioVolumetrico }}
                            - Peso Volumetrico:
                            {{ isset($resultado->pesoVolumetrico) ? $resultado->pesoVolumetrico : '0' }}
                            @if ($resultado->tarifa_por_kg != 0)
                                - Tarifa volumetrica: {{ $resultado->pesoVolumetrico * $resultado->tarifa_por_kg }}
                            @endif
                            - Importe: {{ $resultado->importe }};
                        </li> --}}
                    @endforeach
                </ul>
            @endif
        @endif
    @endisset
</div>
