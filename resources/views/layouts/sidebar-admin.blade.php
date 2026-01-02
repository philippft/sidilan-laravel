<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>SIDILAN | @yield('title')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
   <div class="flex bg-background-sidilan font-poppins">
      <div
         class="w-[300px] h-screen font-poppins bg-dongker-sidilan flex flex-col justify-between py-16 pb-10 sticky top-0">
         <div class="w-full">

            <div class="text-center py-6 flex flex-col items-center gap-1">
               <img src="{{ asset('assets/logo-fmipa.png') }}" alt="Logo FMIPA" class="h-[72px]">
               <h1 class="text-white font-bold text-4xl">SIDILAN</h1>
            </div>

            <!-- Tombol Tambah Data -->
            <div class="w-full flex justify-center pb-6 mt-5">
               <a href="{{ route('admin.tambah') }}">
                  @csrf
                  <x-button
                     class="
                        flex items-center justify-center gap-3 
                        w-[200px] h-16 rounded-xl 
                        bg-hover-sidilan shadow-xl 
                        font-bold text-xl text-white
                ">
                     <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12.0001" cy="12.0003" r="3.93015" stroke="#FDFDFD" stroke-width="2.80637"
                           stroke-linecap="round" />
                        <path
                           d="M16.4178 12.0351C16.7622 11.4386 17.3294 11.0034 17.9946 10.8252C18.6599 10.6469 19.3687 10.7402 19.9652 11.0846C20.5616 11.4289 20.9968 11.9961 21.1751 12.6614C21.3533 13.3266 21.26 14.0355 20.9157 14.6319C20.5713 15.2284 20.0041 15.6636 19.3389 15.8418C18.6736 16.0201 17.9648 15.9268 17.3683 15.5824C16.7719 15.238 16.3367 14.6709 16.1584 14.0056C15.9802 13.3404 16.0735 12.6315 16.4178 12.0351L16.4178 12.0351Z"
                           stroke="#FDFDFD" stroke-width="2.80637" />
                        <path
                           d="M18.667 20L18.667 18.5968H18.667V20ZM23.6006 23.7988L24.9187 23.3176L24.9187 23.3176L23.6006 23.7988ZM18.5059 25.333L17.1204 25.5554L17.3099 26.7362H18.5059V25.333ZM18.4981 25.2773L19.8718 24.9915L19.8718 24.9914L18.4981 25.2773ZM15.708 20.9482L14.8592 19.8309L13.2367 21.0635L14.9668 22.1397L15.708 20.9482ZM18.667 20L18.667 21.4032C20.7786 21.4032 21.7759 22.8925 22.2825 24.2801L23.6006 23.7988L24.9187 23.3176C24.2747 21.554 22.581 18.5969 18.667 18.5968L18.667 20ZM23.6006 23.7988L22.2825 24.2801C22.2718 24.2508 22.2618 24.1954 22.2738 24.128C22.2851 24.0641 22.3114 24.0158 22.3361 23.9849C22.383 23.9265 22.4211 23.9298 22.4102 23.9298V25.333V26.7362C24.0086 26.7362 25.6144 25.2232 24.9187 23.3176L23.6006 23.7988ZM22.4102 25.333V23.9298H18.5059V25.333V26.7362H22.4102V25.333ZM18.5059 25.333L19.8913 25.1107C19.8944 25.1298 19.8962 25.144 19.8966 25.1478C19.8969 25.1499 19.897 25.151 19.8968 25.1493C19.8968 25.1489 19.8962 25.1438 19.8957 25.1397C19.8946 25.1307 19.8923 25.1112 19.8888 25.0875C19.8853 25.0634 19.8799 25.0302 19.8718 24.9915L18.4981 25.2773L17.1243 25.5632C17.1182 25.5337 17.1143 25.5098 17.1122 25.4949C17.111 25.4873 17.1102 25.4813 17.1097 25.4773C17.1092 25.4735 17.1089 25.4709 17.1089 25.4708C17.1089 25.4706 17.1089 25.4708 17.109 25.4716C17.1091 25.472 17.1091 25.4724 17.1092 25.473C17.1092 25.4736 17.1093 25.4744 17.1094 25.4752C17.1098 25.4782 17.1105 25.4839 17.1113 25.4906C17.1121 25.4975 17.1133 25.5067 17.1148 25.5173C17.1162 25.528 17.1181 25.5409 17.1204 25.5554L18.5059 25.333ZM18.4981 25.2773L19.8718 24.9914C19.5693 23.538 18.7443 21.1845 16.4492 19.7568L15.708 20.9482L14.9668 22.1397C16.3086 22.9744 16.8868 24.4221 17.1243 25.5633L18.4981 25.2773ZM15.708 20.9482L16.5568 22.0656C17.0581 21.6848 17.7256 21.4032 18.667 21.4032V20V18.5968C17.1014 18.5968 15.8398 19.086 14.8592 19.8309L15.708 20.9482Z"
                           fill="#FDFDFD" />
                        <path
                           d="M12.0002 20C16.7077 20 18.0911 23.324 18.4977 25.2778C18.6556 26.0365 18.0387 26.6667 17.2637 26.6667H6.73674C5.96178 26.6667 5.34488 26.0365 5.50277 25.2778C5.90933 23.324 7.29276 20 12.0002 20Z"
                           stroke="#FDFDFD" stroke-width="2.80637" stroke-linecap="round" />
                        <path d="M26.6607 4.20947V9.82222" stroke="#FDFDFD" stroke-width="2.80637"
                           stroke-linecap="round" />
                        <path d="M29.467 7.01611L23.8542 7.01611" stroke="#FDFDFD" stroke-width="2.80637"
                           stroke-linecap="round" />
                     </svg>
                     Tambah Data
                  </x-button>
               </a>
            </div>

            <!-- Tulisan Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="h-[72px] px-5 gap-2 text-right flex items-center justify-left hover:bg-hover-sidilan active:bg-sikuning-sidilan">
               <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M24.873 9.42841L23.3712 18.4391C22.9498 20.9679 20.9681 22.9496 18.4393 23.3711L9.42857 24.8729C8.07492 25.0985 6.90137 23.9249 7.12698 22.5713L8.62876 13.5606C9.05024 11.0317 11.0319 9.05008 13.5607 8.6286L22.5714 7.12682C23.9251 6.90121 25.0986 8.07476 24.873 9.42841Z"
                     stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                  <circle cx="16" cy="16" r="3" stroke="#FDFDFD" stroke-width="2"
                     stroke-linecap="round" />
               </svg>
               <p class="font-poppins font-bold text-xl text-white">Dashboard</p>
            </a>

            <!-- Tulisan Manajemen Data -->
            <a href="{{ route('admin.management-data') }}" class="h-[72px] px-5 gap-2 text-left flex items-center justify-left hover:bg-hover-sidilan">
               <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.6668 20L13.3335 25.3333L18.6668 30.6667" stroke="#FDFDFD" stroke-width="2.66667" />
                  <path
                     d="M24.0831 11.3334C24.9022 12.7523 25.3335 14.3617 25.3335 16.0001C25.3335 17.6384 24.9022 19.2479 24.0831 20.6667C23.2639 22.0856 22.0857 23.2638 20.6668 24.083C19.248 24.9022 17.6385 25.3334 16.0002 25.3334"
                     stroke="#FDFDFD" stroke-width="2.66667" stroke-linecap="round" />
                  <path d="M13.3332 12L18.6665 6.66667L13.3332 1.33333" stroke="#FDFDFD" stroke-width="2.66667" />
                  <path
                     d="M7.91693 20.6666C7.09776 19.2477 6.6665 17.6383 6.6665 15.9999C6.6665 14.3616 7.09776 12.7521 7.91693 11.3333C8.73611 9.9144 9.91433 8.73618 11.3332 7.91701C12.752 7.09784 14.3615 6.66658 15.9998 6.66658"
                     stroke="#FDFDFD" stroke-width="2.66667" stroke-linecap="round" />
               </svg>
               <p class="font-poppins font-bold text-xl text-white">Manajemen Data</p>
            </a>

         </div>

         <!-- Button Logout -->
         <form action="{{ route('admin.logout') }}" method="POST" class="w-full flex justify-center">
            @csrf
            <x-button type="submit"
               class="
                flex items-center justify-center gap-3 
                w-[200px] h-16 rounded-xl 
                bg-orange-sidilan shadow-xl 
                font-bold text-xl text-white
        ">

               <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M9.33333 9.50933V8.81613C9.33333 5.95494 9.33333 4.52434 10.2528 3.7269C11.1723 2.92945 12.5885 3.13177 15.4209 3.5364L21.1314 4.35218C24.4062 4.82002 26.0436 5.05393 27.0218 6.18179C28 7.30965 28 8.96369 28 12.2718V19.7284C28 23.0365 28 24.6905 27.0218 25.8184C26.0436 26.9462 24.4062 27.1801 21.1314 27.648L15.4209 28.4638C12.5885 28.8684 11.1723 29.0707 10.2528 28.2733C9.33333 27.4758 9.33333 26.0452 9.33333 23.184V22.7547"
                     stroke="currentColor" stroke-width="2.66667" />
                  <path
                     d="M21.3333 15.9999L22.3745 15.167L23.0408 15.9999L22.3745 16.8328L21.3333 15.9999ZM5.33334 17.3333C4.59696 17.3333 4 16.7363 4 15.9999C4 15.2635 4.59696 14.6666 5.33334 14.6666V15.9999V17.3333ZM16 9.33325L17.0412 8.50033L22.3745 15.167L21.3333 15.9999L20.2922 16.8328L14.9588 10.1662L16 9.33325ZM21.3333 15.9999L22.3745 16.8328L17.0412 23.4995L16 22.6666L14.9588 21.8337L20.2922 15.167L21.3333 15.9999ZM21.3333 15.9999V17.3333H5.33334V15.9999V14.6666H21.3333V15.9999Z"
                     fill="currentColor" />
               </svg>
               Logout
            </x-button>
         </form>
      </div>

      <div class="flex-1 flex flex-col min-w-0 h-full">
         <main class="flex-1 overflow-y-auto px-8 py-12">
            @yield('content')
         </main>
      </div>
   </div>

</body>
