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

    <div>Peso {{ $peso }}</div>

    @isset($resultados)
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
                    - Tarifa: {{ $resultado->tarifa_total }}
                    - Tarifa x Peso: {{ $resultado->tarifa_por_kg }}
                </li>
            @endforeach
        </ul>
    @else
        <b>Sin Resultados</b>
    @endisset
</div>
