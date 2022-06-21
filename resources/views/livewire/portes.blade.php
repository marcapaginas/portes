<div>
    @isset($provincias)
        <label for="provincia">
            Provincia
            <select wire:model="prov" name="provincia" id="provincia" class="border rounded px-3 py-1">
                <option value="" default>Selecciona Provincia</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                @endforeach
            </select>
        </label>
    @endisset
    <label for="peso">
        Peso
        <input type="text" wire:model="peso" name="peso" id="peso" placeholder="Indica peso..."
            class="border rounded px-3 py-1">
    </label>
    <label for="largo">
        Largo
        <input type="text" wire:model="largo" name="largo" id="largo" placeholder="Indica largo..."
            class="border rounded px-3 py-1">
    </label>
    <label for="ancho">
        Ancho
        <input type="text" wire:model="ancho" name="ancho" id="ancho" placeholder="Indica ancho..."
            class="border rounded px-3 py-1">
    </label>
    <label for="alto">
        Alto
        <input type="text" wire:model="alto" name="alto" id="alto" placeholder="Indica largo..."
            class="border rounded px-3 py-1">
    </label>

    <div>Peso {{ $peso }} - Largo {{ $largo }} - Alto {{ $alto }} - Ancho {{ $ancho }} -
        Peso Volumetrico: {{ isset($resultados) ? $resultados->first()->pesoVolumetrico : '0' }} Kg - ratio
        ({{ isset($resultados) ? $resultados->first()->agencia->volumetrico : '0' }} Kg/m3)
    </div>

    @isset($resultados)
        @if ($resultados->isEmpty())
            <b>Sin Resultados</b>
        @else
            <div class="border px-3 py-2 rounded border-green-400 m-2">
                <b>Mejor Tarifa: </b> {{ $resultados->first()->tarifa_total }}€ por
                {{ $resultados->first()->agencia->nombre }}
            </div>
            <ul>
                @foreach ($resultados as $resultado)
                    <li key="{{ $resultado->id }}">{{ $resultado->id }} - Agencia:
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
                        - Peso Volumetrico: {{ $resultado->pesoVolumetrico }}
                        @if ($resultado->tarifa_por_kg != 0)
                            - Tarifa volumetrica: {{ $resultado->pesoVolumetrico * $resultado->tarifa_por_kg }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    @endisset
</div>
