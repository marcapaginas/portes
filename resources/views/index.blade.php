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

<body class="h-screen bg-gradient-to-br from-green-500 to-gray-700">

    <div
        class="w-2/3 fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2
    bg-white drop-shadow-xl rounded-xl p-10 ">
        <livewire:portes />
    </div>




    {{-- dd(get_defined_vars()['__data']) --}}
    @livewireScripts
</body>

</html>
