@extends('layouts.sidebar-admin')
@section('title', 'Dashboard Admin')

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
   <p  class="font-poppins text-4xl font-bold mb-4">Dashboard</p>

   <div x-data="{ 
     state: '{{ request()->has('status') ? 'status' : (request()->has('gender') ? 'gender' : (request()->has('pendidikan') ? 'pendidikan' : (request()->has('jenisPosisi') ? 'jumlah' : 'none'))) }}'
   }" class="w-full lg:gap-5 h-full">
       <div
            class="flex overflow-x-auto gap-4 px-4 pb-8 lg:grid lg:grid-cols-4 lg:gap-6">
            <a href="{{ route('admin.dashboard', ['jenisPosisi' => 'jumlah']) }}" class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
               <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                  <div class="w-fit text-center mx-auto">
                     <h1 class="font-bold text-xl mb-2">JUMLAH</h1>
                     <canvas id="chart-jumlah" class="w-full"></canvas>
                  </div>
               </x-card-box>
            </a>
            <a href="{{ route('admin.dashboard', ['pendidikan' => 'pendidikan']) }}" class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
               <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                  <div class="w-fit text-center mx-auto">
                     <h1 class="font-bold text-xl mb-2">PENDIDIKAN</h1>
                     <canvas id="chart-pendidikan" class="w-full"></canvas>
                  </div>
               </x-card-box>
            </a>
            <a href="{{ route('admin.dashboard', ['gender' => 'gender']) }}" class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
               <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                  <div class="w-fit text-center mx-auto">
                     <h1 class="font-bold text-xl mb-2">JENIS KELAMIN</h1>
                     <canvas id="chart-gender" class="w-full"></canvas>
                  </div>
               </x-card-box>
            </a>
            <a href="{{ route('admin.dashboard', ['status' => 'status']) }}" class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
               <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                  <div class="w-fit text-center mx-auto">
                     <h1 class="font-bold text-xl mb-2">STATUS</h1>
                     <canvas id="chart-status" class="w-full"></canvas>
                  </div>
               </x-card-box>
            </a>
         </div>

         <x-card-box x-cloak x-show="state == 'none'" class="h-fit bg-yellow-500">
            <div class="w-full h-full">
               <div class="text-center">
                  <h1 class="font-bold">Tidak Ada Data</h1>
                  <p class="">Silahkan pilih filtrasi berdasarkan grafik disamping!</p>
               </div>
            </div>
         </x-card-box>
         
         <div x-cloak x-show="state != 'none'" class="w-full mb-4">
            {{-- 1. Filter JUMLAH --}}
            <div x-cloak x-show="state == 'jumlah'" class="flex text-white gap-2 mb-2" >
               @foreach($tombolPosisi as $option)
                  <a href="{{ route('admin.dashboard', ['jenisPosisi' => $option['value']]) }}">
                     <x-button
                     class="w-full items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('jenisPosisi') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                        {{ $option['label'] }}
                     </x-button>
                  </a>
               @endforeach
            </div>
        
            {{-- 2. Filter PENDIDIKAN --}}
            <div x-cloak x-show="state == 'pendidikan'" class="text-white gap-2 flex mb-2" >
               @foreach($tombolPendidikan as $option)
                  <a href="{{ route('admin.dashboard', ['pendidikan' => $option['value']]) }}">
                     <x-button
                     class="h-full items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('pendidikan') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                        {{ $option['label'] }}
                     </x-button>
                  </a>
               @endforeach
            </div>
        
            {{-- 3. Filter GENDER --}}
            <div x-cloak x-show="state == 'gender'" class="text-white gap-2 flex mb-2" >
               @foreach($tombolGender as $option)
                  <a href="{{ route('admin.dashboard', ['gender' => $option['value']]) }}">
                     <x-button
                     class="h-full items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('gender') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                        {{ $option['label'] }}
                     </x-button>
                  </a>
               @endforeach
            </div>
        
            {{-- 4. Filter STATUS --}}
            <div x-cloak x-show="state == 'status'" class="text-white gap-2 flex mb-2" >
               @foreach($tombolStatus as $option)
                  <a href="{{ route('admin.dashboard', ['status' => $option['value']]) }}">
                     <x-button
                     class="h-full items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('status') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                        {{ $option['label'] }}
                     </x-button>
                  </a>
               @endforeach
            </div>
         </div>
         
         <div class=" h-auto">
            @forelse ($persons as $person)
               <x-person-card :person="$person"></x-person-card>
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

         <div>
            <x-bottom-pagination :paginator="$persons" />
         </div>
      </div>


   </div>
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