<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>タイトル</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
        @livewireStyles
    </head>

    <body>

        {{ $slot }}

        @livewireScripts

        @stack('js')
    </body>

</html>