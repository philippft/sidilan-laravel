<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="view-transition" content="same-origin" />
   <title>SIDILAN | Landing Page</title>
   @vite('resources/css/app.css')
</head>

<body>
   <div class="bg-[url(/public/assets/rektorat.png)] bg-cover bg-center">
      <div
         class="md:bg-linear-to-t bg-linear-to-b from-dongker-sidilan to-[#848484]/30 md:from-[#546E7A] md:via-[#2274C2]/90 from-10% via-60% h-screen">
         <div class="mx-auto w-fit h-full py-20 md:py-30 lg:py-50 text-center">
            <img src="{{ asset('assets/logo-fmipa.png') }}" alt="Logo-FMIPA"
               class="animate-blur-in size-30 md:size-41 mb-3 md:mb-1 mx-auto">
            <img src="{{ asset('assets/Selamat Datang.png') }}" alt="selamat-datang"
               class="md:block hidden animate-blur-in md:size-auto mb-3 md:mb-1 mx-auto">
            <img src="{{ asset('assets/Selamat Datang Mobile.png') }}" alt="selamat-datang"
               class="md:hidden animate-blur-in size-auto mb-3 md:mb-1 mx-auto">
            <h1 class="animate-blur-in font-poppins font-bold text-5xl md:text-8xl text-white">SIDILAN</h1>

            <a href="{{ route('user.dashboard') }}"
               class="animate-blur-bounce block mx-auto w-fit mt-15 md:mt-25 bg-dongker-sidilan px-4 py-2 md:px-8 md:py-4 rounded-4xl text-white">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd"
                     d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                     clip-rule="evenodd" />
               </svg>
            </a>

         </div>
      </div>
   </div>
</body>

</html>
