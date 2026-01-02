<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="view-transition" content="same-origin" />
   <title>SIDILAN | @yield('title')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins">
   <div class="w-full bg-dongker-sidilan md:flex justify-between items-center py-6 px-9 text-white">
      <div class="flex md:gap-3 gap-2 mb-2 md:mb-0 items-center w-full">
         <img src="{{ asset('assets/logo-fmipa.png') }}" alt="Logo FMIPA" class="size-11 md:size-18 lg:size-21">
         <div class="font-bold">
            <h1 class="lg:text-4xl md:text-2xl md:mb-1 text-base">SIDILAN</h1>
            <p class="lg:text-sm md:text-xs text-[10px] font-light md:font-bold">Sistem Data Tendik dan Laboran</p>
         </div>
      </div>
      <div class="flex lg:gap-6 md:gap-3 gap-2 w-full">
         <x-nav-link
            class="w-1/3 flex grow items-center md:grow-0 text-black font-medium hover:bg-abu-sidilan/90 bg-[#e0e0e0] rounded-full lg:px-6 md:py-3 md:px-4 md:text-xs lg:text-base px-3 py-2 text-[10px] "
            href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
            <span class="grow">
               Beranda
            </span>
         </x-nav-link>
         <x-nav-link
            class="w-1/3 flex grow items-center md:grow-0 text-black font-medium hover:bg-abu-sidilan/90 bg-[#e0e0e0] rounded-full lg:px-6 md:py-3 md:px-4 md:text-xs lg:text-base px-3 py-2 text-[10px] "
            href="{{ route('user.tenaga-pendidik') }}" :active="request()->routeIs('user.tenaga-pendidik*')">
            <span class="grow">
               Tenaga Pendidik
            </span>
         </x-nav-link>
         <x-nav-link
            class="w-1/3 flex grow items-center md:grow-0 text-black font-medium hover:bg-abu-sidilan/90 bg-[#e0e0e0] rounded-full lg:px-6 md:py-3 md:px-4 md:text-xs lg:text-base px-3 py-2 text-[10px] "
            href="{{ route('user.plp-teknisi') }}" :active="request()->routeIs('user.plp-teknisi*')">
            <span class="grow">
               PLP dan Teknisi Lab
            </span>
         </x-nav-link>
      </div>
   </div>
   <div class="py-5 px-9 w-full min-h-screen h-full bg-background-sidilan">
      @yield('content')
   </div>



   @yield('script')
</body>

</html>
