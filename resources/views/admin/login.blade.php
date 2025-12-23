<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIDILAN | Login-Admin</title>
    @vite('resources/css/app.css')
</head>

<body>
   <div class="w-full flex justify-between items-center h-screen bg-background-sidilan">
      <div class="flex flex-col justify-center w-full px-12 md:px-16 md:py-4">
         <!-- Header -->
         <div class="text-center mb-12">
            <img src="{{ asset('assets/logo-fmipa.png') }}" alt="Logo FMIPA" class="h-24 mx-auto">
            <p class="font-bold text-[32px] font-poppins">LOGIN</p>
            <h1 class="font-medium text-xl">Sistem Data Tendik dan Laboran</h1>
         </div>

         <!-- Input Form -->
         <form action="{{ url('admin/login') }}" method="post" class="justify-center">
            @csrf
            <div class="relative">
               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
               </div>
               <x-text-field type="text" name="username" id="username" label='Username' placeholder="Username"
                  class="border-abu-sidilan h-10 md:h-14 pl-10 rounded-md md:rounded-xl" />
            </div>
            <div class="relative">
               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
               </div>
               <x-text-field type="password" name="password" id="password" label="Password" placeholder="Password"
                  class="border-abu-sidilan h-10 md:h-14 pl-10 rounded-md md:rounded-xl" />
            </div>
            <div class="flex items-center gap-2 my-4">
               <input type="checkbox" name="remember" id="remember" class="w-4 h-4 borde-black">
               <h3 class="font-medium text-xs md:text-md font-poppins">Remember Me</h3>
            </div>
            <x-button type="submit"
               class="w-full h-16 md:h-[72px] font-poppins font-extrabold text-xl md:text-2xl rounded-xl text-white bg-dongker-sidilan">LOGIN</x-button>
         </form>

         <!-- Footer -->
         <div class="text-center font-medium font-poppins mt-24 text-xs md:text-md text-gray-400">
            Copyright SIDILAN 2025. All rights reserved
         </div>
      </div>

      <div class="hidden md:flex w-full h-full">
         <img src="{{ asset('assets/foto-login.png') }}" alt="Gambar Login" class="w-full h-full object-cover">
      </div>
   </div>
</body>

</html>
