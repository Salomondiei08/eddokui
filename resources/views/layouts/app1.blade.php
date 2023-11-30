<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>
            {{ config('app.name', 'Laravel') }}
            @isset($title)
                - {{ $title }}
            @endisset
        </title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
            content-visibility: auto;
            }
        }
        </style>

         <link rel="icon" href="{{ asset('img/ED.png') }}" type="image/png">
         {{-- cdn icofont --}}
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css">
         <link rel="stylesheet" type="text/css" href="https://cdn.qenium.com/icofont/icofont.css">
         {{-- Alpine JS --}}
         <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
         {{-- Tailwind CSS --}}
         <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
         <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

         <script>
            tailwind.config = {
              theme: {
                extend: {
                  colors: {
                    clifford: '#da373d',
                  }
                }
              }
            }
        </script>

         <script src="https://cdn.tailwindcss.com"></script>
         <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>


        @livewireStyles
        @livewireScripts
        @stack('scripts')

    </head>

    <body class="antialiased">
       {{--  {{ $slot }} --}}
        @yield('content')
        @livewire('notifications')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />
    </body>
</html>
