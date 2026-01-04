@extends('layouts.main-layout')
@section('title', 'Dashboard')

@section('content')

   @php
      $tombolPosisi = [
          [
              'label' => 'PLP',
              'value' => '1',
          ],
          [
              'label' => 'Tendik',
              'value' => '2',
          ],
      ];

      $tombolPendidikan = [
          [
              'label' => 'Sarjana',
              'value' => '6',
          ],
          [
              'label' => 'Magister',
              'value' => '7',
          ],
          [
              'label' => 'Doktor',
              'value' => '8',
          ],
          [
              'label' => 'Diploma 1',
              'value' => '2',
          ],
          [
              'label' => 'Diploma 2',
              'value' => '3',
          ],
          [
              'label' => 'Diploma 3',
              'value' => '4',
          ],
          [
              'label' => 'Diploma 4',
              'value' => '5',
          ],
          [
              'label' => 'SMA/Sederajat',
              'value' => '1',
          ],
      ];

      $tombolGender = [
          [
              'label' => 'Laki-Laki',
              'value' => 'laki-laki',
          ],
          [
              'label' => 'Perempuan',
              'value' => 'perempuan',
          ],
      ];

      $tombolStatus = [
          [
              'label' => 'Aktif',
              'value' => '1',
          ],
          [
              'label' => 'Tidak Aktif',
              'value' => '0',
          ],
      ];
   @endphp
   {{-- @dd($statusStats) --}}
   <div x-data="{
       state: '{{ request()->has('status') ? 'status' : (request()->has('gender') ? 'gender' : (request()->has('pendidikan') ? 'pendidikan' : (request()->has('jenisPosisi') ? 'jumlah' : 'none'))) }}'
   }" class="lg:flex w-full lg:gap-5 h-full min-h-screen">
      <div
         class="flex overflow-x-auto lg:overflow-visible lg:grid lg:grid-cols-2 lg:grid-rows-2 lg:gap-9 gap-4 lg:w-[40%] lg:p-0 p-4 snap-x items-center shrink-0">
         <a href="{{ route('user.dashboard', ['jenisPosisi' => '1']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64 block">
            <x-card-box class="w-full ">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JUMLAH</h1>
                  <canvas id="chart-jumlah" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('user.dashboard', ['pendidikan' => '6']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64 block">
            <x-card-box class="w-full ">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">PENDIDIKAN</h1>
                  <canvas id="chart-pendidikan" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('user.dashboard', ['gender' => 'laki-laki']) }}">
            <x-card-box class="w-full ">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JENIS KELAMIN</h1>
                  <canvas id="chart-gender" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('user.dashboard', ['status' => '1']) }}">
            <x-card-box class="w-full ">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">STATUS</h1>
                  <canvas id="chart-status" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
      </div>

      <x-card-box x-cloak x-show="state == 'none'" class="w-[60%] " animasi="animate-blur-in">
         <div class="w-full h-full items-center flex justify-center">
            <div class="text-center">
               <h1 class="font-bold">Tidak Ada Data</h1>
               <p class="">Silahkan pilih filtrasi berdasarkan grafik disamping!</p>
            </div>
         </div>
      </x-card-box>


      <div x-cloak x-show="state != 'none'" class=" w-[60%] my-3 h-auto animate-blur-in">
         {{-- Jumlah Button --}}
         <div x-cloak x-show="state == 'jumlah'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolPosisi as $tombol)
               <a href="{{ route('user.dashboard', ['jenisPosisi' => $tombol['value']]) }}">
                  <x-button
                     class="rounded-full px-6 py-3 {{ request('jenisPosisi') == $tombol['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $tombol['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- Pendidikan Button --}}
         <div x-cloak x-show="state == 'pendidikan'" class="text-white gap-2 flex mb-2 overflow-x-auto no-scrollbar">
            @foreach ($tombolPendidikan as $tombol)
               <a href="{{ route('user.dashboard', ['pendidikan' => $tombol['value']]) }}" class="block shrink-0">
                  <x-button
                     class="rounded-full px-6 py-3 {{ request('pendidikan') == $tombol['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $tombol['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- Gender Button --}}
         <div x-cloak x-show="state == 'gender'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolGender as $tombol)
               <a href="{{ route('user.dashboard', ['gender' => $tombol['value']]) }}">
                  <x-button
                     class="rounded-full px-6 py-3 {{ request('gender') == $tombol['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $tombol['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- Status Button --}}
         <div x-cloak x-show="state == 'status'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolStatus as $tombol)
               <a href="{{ route('user.dashboard', ['status' => $tombol['value']]) }}">
                  <x-button
                     class="rounded-full px-6 py-3 {{ request('status') == $tombol['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $tombol['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         <div class="max-h-screen h-auto">
            @forelse ($persons as $person)
               <x-card-box class="h-full">
                  <div>
                     <h1 class="font-bold">{{ $person->full_name }}</h1>
                     <p>{{ $person->position->name }}</p>
                  </div>

               </x-card-box>
            @empty
               <x-card-box class="h-full ">
                  <div class="w-full h-full items-center flex justify-center">
                     <div class="text-center grow">
                        <h1 class="font-bold">Tidak Ada Data</h1>
                     </div>
                  </div>
               </x-card-box>
            @endforelse
         </div>
      </div>
   </div>

   <!-- Jika data kosong -->
@endsection

@section('script')
   <script type="module">
      const totalJmlh = {{ $totalPersons }}

      const initChartJumlah = () => {
         const data = @json($positionTypeStats);
         const labels = data.map(item => item.nama_jenis_posisi)
         const value = data.map(item => item.total_jenis_posisi)
         const ctx = document.getElementById('chart-jumlah');
         if (!ctx) return;
         const centerTextPlugin = {
            id: 'centerText',
            beforeDraw: function(chart) {
               var width = chart.width,
                  height = chart.height,
                  ctx = chart.ctx;

               ctx.restore();

               var fontSize = (height / 114).toFixed(2);
               ctx.font = "bold " + fontSize + "em sans-serif";
               ctx.textBaseline = "middle";
               ctx.textAlign = "center";
               ctx.fillStyle = "#333";
               var total = totalJmlh;
               var meta = chart.getDatasetMeta(0);
               var x = meta.data[0].x;
               var y = meta.data[0].y;

               ctx.fillText(total, x, y);
               ctx.save();
            }
         };

         new Chart(ctx, {
            type: 'doughnut',
            data: {
               labels: labels,
               datasets: [{
                  label: 'Jumlah',
                  data: value,
                  backgroundColor: [
                     '#F3C623',
                     '#EB8317'
                  ],
                  borderWidth: 0,
                  hoverOffset: 4
               }]
            },
            options: {
               responsive: true,
               cutout: '70%',
               plugins: {
                  legend: {
                     position: 'bottom',
                     labels: {
                        usePointStyle: true,
                        padding: 20
                     }
                  },
                  title: {
                     display: false,
                  },
                  tooltip: {
                     enabled: true
                  }
               }
            },
            plugins: [centerTextPlugin]
         })
      }

      const initChartPendidikan = () => {
         const data = @json($educationStats);
         const labels = data.map(item => item.jenjang_pendidikan)
         const value = data.map(item => item.total_pegawai)
         const ctx = document.getElementById('chart-pendidikan');
         if (!ctx) return;

         new Chart(ctx, {
            type: 'doughnut',
            data: {
               labels: labels,
               datasets: [{
                  data: value,
                  backgroundColor: [
                     '#2ECC71',
                     '#E67E22',
                     '#3498DB',
                     '#E74C3C',
                     '#F1C40F',
                     '#6610f2',
                     '#d63384',
                     '#8D99AE',
                  ],
                  borderWidth: 0,
                  hoverOffset: 4
               }]
            },
            options: {
               responsive: true,
               cutout: '70%',
               plugins: {
                  legend: {
                     position: 'bottom',
                     labels: {
                        usePointStyle: true,
                        padding: 10
                     }
                  },
                  title: {
                     display: false,
                  },
                  tooltip: {
                     enabled: true
                  }
               }
            },
         })
      }

      const initChartGender = () => {
         const data = @json($genderStats);
         const labels = data.map(item => item.gender)
         const value = data.map(item => item.total)
         const ctx = document.getElementById('chart-gender');
         if (!ctx) return;

         new Chart(ctx, {
            type: 'doughnut',
            data: {
               labels: labels,
               datasets: [{
                  data: value,
                  backgroundColor: [
                     '#8CE4FF',
                     '#FF5656'
                  ],
                  borderWidth: 0,
                  hoverOffset: 4
               }]
            },
            options: {
               responsive: true,
               cutout: '70%',
               plugins: {
                  legend: {
                     position: 'bottom',
                     labels: {
                        usePointStyle: true,
                        padding: 20
                     }
                  },
                  title: {
                     display: false,
                  },
                  tooltip: {
                     enabled: true
                  }
               }
            },
         })
      }

      const initChartStatus = () => {
         const data = @json($statusStats);
         const labels = data.map(item => item.is_active == 1 ? 'Aktif' : 'Tidak Aktif');
         const value = data.map(item => item.total)
         const bgColors = data.map(item => item.is_active == 1 ? '#0288D1' : '#546E7A');
         const ctx = document.getElementById('chart-status');
         if (!ctx) return;

         new Chart(ctx, {
            type: 'doughnut',
            data: {
               labels: labels,
               datasets: [{
                  data: value,
                  backgroundColor: bgColors,
                  borderWidth: 0,
                  hoverOffset: 4
               }]
            },
            options: {
               responsive: true,
               cutout: '70%',
               plugins: {
                  legend: {
                     position: 'bottom',
                     labels: {
                        usePointStyle: true,
                        padding: 20
                     }
                  },
                  title: {
                     display: false,
                  },
                  tooltip: {
                     enabled: true
                  }
               }
            },
         })
      }


      document.addEventListener("DOMContentLoaded", function() {
         initChartJumlah();
         initChartPendidikan();
         initChartGender();
         initChartStatus();
      });
   </script>
@endsection
