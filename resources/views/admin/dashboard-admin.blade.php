@extends('layouts.sidebar-admin')
@section('title', 'Dashboard Admin')

@section('content')

   @php
      $tombolPosisi = [
          [
              'label' => 'Tendik',
              'value' => '1',
          ],
          [
              'label' => 'PLP dan Laboran',
              'value' => '2',
          ],
      ];

      $tombolPendidikan = $educationStats->pluck('jenjang_pendidikan', 'edu')->toArray();

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

   {{-- @dd($tombolPendidikan) --}}
   <p class="font-poppins text-4xl font-bold mb-4">Dashboard</p>

   <button type="button" onclick="mulaiCetak()" class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 00-2 2h2m2 4h10a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
    </svg>
    <span class="font-bold">Cetak PDF</span>
</button>

{{-- Iframe Tersembunyi --}}
<iframe id="print_frame" name="print_frame" style="display:none;" src="{{ route('admin.pdf') }}"></iframe>

   <div x-data="{
       state: '{{ request()->has('status') ? 'status' : (request()->has('gender') ? 'gender' : (request()->has('pendidikan') ? 'pendidikan' : (request()->has('jenisPosisi') ? 'jumlah' : 'none'))) }}'
   }" class="w-full flex flex-col lg:gap-5 h-screen">
      <div class="flex shrink-0 overflow-x-auto gap-4 px-4 pb-8 lg:grid lg:grid-cols-4 lg:gap-6">
         <a href="{{ route('admin.dashboard', ['jenisPosisi' => '1']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
            <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JUMLAH</h1>
                  <canvas id="chart-jumlah" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('admin.dashboard', ['pendidikan' => '1']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
            <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">PENDIDIKAN</h1>
                  <canvas id="chart-pendidikan" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('admin.dashboard', ['gender' => 'laki-laki']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
            <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JENIS KELAMIN</h1>
                  <canvas id="chart-gender" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
         <a href="{{ route('admin.dashboard', ['status' => '1']) }}"
            class="cursor-pointer lg:shrink shrink-0 lg:w-auto w-64">
            <x-card-box class="w-full transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">STATUS</h1>
                  <canvas id="chart-status" class="w-full"></canvas>
               </div>
            </x-card-box>
         </a>
      </div>

      <x-card-box x-cloak x-show="state == 'none'" class="grow">
         <div class="w-full h-full flex justify-center items-center">
            <div class="text-center grow">
               <h1 class="font-bold">Tidak Ada Data</h1>
               <p class="">Silahkan pilih filtrasi berdasarkan grafik diatas!</p>
            </div>
         </div>
      </x-card-box>

      <div x-cloak x-show="state != 'none'" class="w-full mb-4 flex flex-col">
         {{-- 1. Filter JUMLAH --}}
         <div x-cloak x-show="state == 'jumlah'" class="flex text-white gap-2 mb-2">
            @foreach ($tombolPosisi as $option)
               <a href="{{ route('admin.dashboard', ['jenisPosisi' => $option['value']]) }}">
                  <x-button
                     class="w-full h-full px-4 py-4 items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('jenisPosisi') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $option['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- 2. Filter PENDIDIKAN --}}
         <div x-cloak x-show="state == 'pendidikan'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolPendidikan as $id => $name)
               <a href="{{ route('admin.dashboard', ['pendidikan' => $id]) }}">
                  <x-button
                     class="w-full h-full px-4 py-4 items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('pendidikan') == $id ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $name }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- 3. Filter GENDER --}}
         <div x-cloak x-show="state == 'gender'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolGender as $option)
               <a href="{{ route('admin.dashboard', ['gender' => $option['value']]) }}">
                  <x-button
                     class="w-full h-full px-4 py-4 items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('gender') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $option['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         {{-- 4. Filter STATUS --}}
         <div x-cloak x-show="state == 'status'" class="text-white gap-2 flex mb-2">
            @foreach ($tombolStatus as $option)
               <a href="{{ route('admin.dashboard', ['status' => $option['value']]) }}">
                  <x-button
                     class="w-full h-full px-4 py-4 items-center justify-center font-bold text-lg rounded-tl-2xl rounded-tr-2xl {{ request('status') == $option['value'] ? 'bg-dongker-sidilan' : 'bg-[#E0E0E0]' }}">
                     {{ $option['label'] }}
                  </x-button>
               </a>
            @endforeach
         </div>

         <div class="grow">
            @forelse ($persons as $person)
               <x-person-card :person="$person"></x-person-card>
            @empty
               <x-card-box class="h-full">
                  <div class="w-full h-full items-center flex justify-center">
                     <div class="text-center">
                        <h1 class="font-bold">Tidak Ada Data</h1>
                        <p class="">Silahkan pilih filtrasi berdasarkan kategori!</p>
                     </div>
                  </div>
               </x-card-box>
            @endforelse
         </div>

         {{-- PAGINATION --}}
         <x-pagination :data="$persons" />

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

      window.mulaiCetak = function() {
        const frame = document.getElementById('print_frame');
        frame.contentWindow.location.reload();
        
        frame.onload = function() {
            frame.contentWindow.focus();
            frame.contentWindow.print();
        };
      }

   </script>
@endsection
