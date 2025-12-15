<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>SIDILAN | @yield('title')</title>
   @vite('resources/css/app.css')
</head>

<body class="font-poppins">
   <div class="bg-dongker-sidilan flex justify-between items-center py-6 px-9 text-white">
      <div class="flex gap-3 items-center">
         <img src="{{ asset('assets/logo-fmipa.png') }}" alt="Logo FMIPA" class="size-21">
         <div class="font-bold">
            <h1 class="text-4xl mb-1">SIDILAN</h1>
            <p class="text-sm">Sistem Data Tendik dan Laboran</p>
         </div>
      </div>
      <div class="flex gap-6">
         <x-nav-link href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
            Beranda
         </x-nav-link>
         <x-nav-link href="{{ route('user.tenaga-pendidik') }}" :active="request()->routeIs('user.tenaga-pendidik*')">
            Tenaga Pendidik
         </x-nav-link>
         <x-nav-link href="{{ route('user.plp-teknisi') }}" :active="request()->routeIs('user.plp-teknisi*')">
            PLP dan Teknisi Lab
         </x-nav-link>
      </div>
   </div>
   <div class="py-5 px-9">
      @yield('content')
   </div>
</body>

</html>
