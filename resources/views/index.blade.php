<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portes</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-gradient-to-br from-gray-500 to-gray-700">

    <div
        class="w-2/3 max-w-xl fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2
    bg-white drop-shadow-xl rounded-xl p-10 transition-all">
        <livewire:portes />
    </div>

    {{-- dd(get_defined_vars()['__data']) --}}
    @livewireScripts
</body>

</html>
