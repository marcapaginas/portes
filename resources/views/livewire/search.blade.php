<label for="provincia">
    Provincia
    <select wire:model="prov" name="provincia" id="provincia" class="border rounded px-3 py-1">
        @isset($provincias)
            @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
        @endisset
    </select>
</label>
<label for="peso">
    Peso
    <input type="text" wire:model="peso" name="peso" id="peso" placeholder="Indica peso..."
        class="border rounded px-3 py-1">
</label>
<label for="ancho">
    Ancho
    <input type="text" wire:model="ancho" name="ancho" id="ancho" placeholder="Indica anchura..."
        class="border rounded px-3 py-1">
</label>
<label for="largo">
    Largo
    <input type="text" wire:model="largo" name="largo" id="largo" placeholder="Indica largo..."
        class="border rounded px-3 py-1">
</label>
<label for="alto">
    Alto
    <input type="text" wire:model="alto" name="alto" id="alto" placeholder="Indica altura..."
        class="border rounded px-3 py-1">
</label>
<button wire:click="getResultados" class="bg-green-500 rounded text-white font-bold px-3 py-1">Enviar</button>
<div>Peso {{ $peso }}</div>

@isset($resultados)
    <ul>
        @foreach ($resultados as $resultado)
            <li key="{{ $resultado->id }}">{{ $resultado->id }} - Agencia: {{ $resultado->agencia->nombre }} -
                Peso: {{ $resultado->peso->tramo_peso }} </li>
        @endforeach
    </ul>
@endisset
