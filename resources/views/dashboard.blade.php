@extends('layouts.main-layout')
@section('title', 'Dashboard')

@section('content')

   {{-- @dd($persons) --}}
   <div class="flex w-full gap-5">
      <div class="grid grid-cols-2 grid-rows-2 gap-9 w-[40%]">
         <button class="cursor-pointer hover">
            <x-card-box class="w-full">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JUMLAH</h1>
                  <canvas id="chart-jumlah" class="w-full"></canvas>
               </div>
            </x-card-box>
         </button>
         <button>
            <x-card-box class="w-full">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">PENDIDIKAN</h1>
                  <canvas id="chart-pendidikan" class="w-full"></canvas>
               </div>
            </x-card-box>
         </button>
         <button>
            <x-card-box class="w-full">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">JENIS KELAMIN</h1>
                  <canvas id="chart-jenisKelamin" class="w-full"></canvas>
               </div>
            </x-card-box>
         </button>
         <button>
            <x-card-box class="w-full">
               <div class="w-fit text-center mx-auto">
                  <h1 class="font-bold text-xl mb-2">STATUS</h1>
                  <canvas id="chart-status" class="w-full"></canvas>
               </div>
            </x-card-box>
         </button>


      </div>

      <x-card-box class="w-[60%]">

         <p class="">Belum ada data tendik atau laboran.</p>

      </x-card-box>



   </div>

   <!-- Jika data kosong -->
@endsection

@section('script')
   <script type="module">
      const totalJmlh = {{ $persons->count() }};
      const plp = {{ $persons->where('position_type_id', 1)->count() }};
      const tendik = {{ $persons->where('position_type_id', 2)->count() }};

      const sma = {{ $persons->where('') }}

      const ctx = document.getElementById('chart-jumlah');
      const ctx1 = document.getElementById('chart-pendidikan');
      const ctx2 = document.getElementById('chart-jenisKelamin');
      const ctx3 = document.getElementById('chart-status');

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
            var total = chart.config.data.datasets[0].data.reduce((a, b) => a + b, 0);
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
            labels: ['PLP dan Teknisi LAB', 'Tenaga Pendidik'],
            datasets: [{
               label: 'Jumlah',
               data: [plp, tendik],
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
      });
   </script>
@endsection
