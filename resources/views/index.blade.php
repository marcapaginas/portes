<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portes</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
</head>

<body class="p-3">
    <div class="p-4 font-bold text-center text-white bg-blue-500">
        Portes
    </div>
    {{-- dd($datos->first()->agencia->nombre) --}}
    {{-- dd(get_defined_vars()['__data']) --}}
    <h2 class="text-xl font-bold underline">Tarifas</h2>
    {{-- @isset($provincias)
        @foreach ($provincias as $provincia)
            hola
            {{ $provincia['nombre'] }}
        @endforeach
    @else
        NO
    @endisset --}}
    <livewire:portes />
    @livewireScripts
</body>

</html>
