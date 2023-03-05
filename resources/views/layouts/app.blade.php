
<!--

    // created by Aditya Nanda Utama, S.Kom and Aliyatul Maghfiroh, S.Kom
    //
    // have any project? you can contact me at https://aditnanda.com
    // instagram : @adit.nanda & @aliyatulmaghfiroh
    // PLEASE DO NOT DELETE THIS COPYRIGHT IF YOU ARE A HUMAN.

-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet" type="text/css" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->

        <style>


            /*the container must be positioned relative:*/
            .autocomplete {
              position: relative;
              display: inline-block;
            }



            .autocomplete-items {
              position: absolute;
              border: 1px solid #d4d4d4;
              border-bottom: none;
              border-top: none;
              z-index: 99;
              /*position the autocomplete items to be the same width as the container:*/
              top: 100%;
              left: 0;
              right: 0;
            }

            .autocomplete-items div {
              padding: 10px;
              cursor: pointer;
              background-color: #fff;
              border-bottom: 1px solid #d4d4d4;
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
              background-color: #e9e9e9;
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
              background-color: DodgerBlue !important;
              color: #ffffff;
            }
        </style>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <x-footer />

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

    </body>
</html>
