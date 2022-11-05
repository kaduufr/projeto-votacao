<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js'])
    @vite(['resources/sass/app.scss'])

  </head>
  <body>
    <div class="bg-all">
      <div class="container py-4 min-vh-100">
        @yield('content')
      </div>
    </div>
  </body>
  @stack('scripts')
</html>
