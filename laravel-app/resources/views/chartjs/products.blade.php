@if ($flag !== true)
  @include('templates.header')
  @include('templates.menu')
@endif

@if ($flag === true)
  <link rel="stylesheet" type="text/css" href="{{ public_path('css/pdfreport.css') }}">
@endif

<!-- ChartJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
  <h1><i class="bi bi-file-earmark-bar-graph-fill"></i> รายงานสินค้าคงคลัง (Inventory Report)</h1>
  <hr />
  @if ($flag !== true)
    <span class="d-flex justify-content-end mb-1"><a href="/chart_products/pdf" class="btn btn-danger" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i> Export PDF</a></span>
  @endif
  <div class="table-responsive mb-3">
    <table class="table"  >
      <thead>
        <tr class="text-center table-primary">
          <th scope="col" rowspan="2">#</th>
          <th scope="col" rowspan="2">ชื่อสินค้า</th>
          <th scope="col" rowspan="2">หมวดหมู่</th>
          <th scope="col" rowspan="2">ราคาต่อหน่วย</th>
          <th scope="col" colspan="2">จำนวนสินค้า</th>
        </tr>
        <tr class="text-center table-primary">
          <th scope="col">ตั้งต้น</th>
          <th scope="col">คงเหลือ</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($prods_rp as $prod)
        <tr>
          <td scope="row">{{ $prod->prod_id }}</td>
          <td>{{ $prod->prod_name }}</td>
          <td>{{ $prod->cate_name }}</td>
          <td class="txt_r text-end">{{ number_format($prod->prod_price, 2) }}</td>
          <td class="txt_r text-end">{{ $prod->prod_amount }}</td>
          <td class="txt_r text-end">{{ $prod->prod_balance }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">ไม่มีข้อมูลสินค้า</p>
        </tr>
      @endforelse
      </tbody>
    </table>
  </div>

  @if ($flag !== true)
  <h2><i class="bi bi-graph-up"></i> แผนภาพข้อมูลสินค้าคงคลัง (Inventory Chart)</h2>
  <hr />
  <canvas id="myChart" style="width:100%;height:350px;">
    <div class="spinner-border text-secondary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </canvas>
<!--   <p>
    <img src="{{ public_path('/images/testing.jpg') }}" style="width: 100%">
  </p> -->
  <script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var data_a =  {{ Js::from($data_a) }};
    var data_b =  {{ Js::from($data_b) }};

    const data = {
      labels: labels,
      datasets: [
        {
          label: 'สินค้าตั้งต้น',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: data_a,
        },
        {
          label: 'สินค้าคงเหลือ',
          backgroundColor: 'rgb(0, 39, 147)',
          borderColor: 'rgb(0, 39, 147)',
          data: data_b,
        }
      ]
    };
    
    const config = {
      type: 'line',
      data: data,
      options: {
        plugins: {
          legend: {
            labels: {
              // This more specific font property overrides the global property
              font: {
                family: "'Kanit', 'Tahoma'"
              }
            },
            datasets: {
              font: {
                family: "'Kanit', 'Tahoma'"
              }
            }
          }
        }
      }
    };
    
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>
  @else
      <div style="text-align: right; margin: 5px;">
      วันที่/เวลา {{ date('d-m-Y h:i:s') }} น.<br />
      พิมพ์โดย {{ Session::get('keyEmail') }}
    </div>
  @endif
</div>

@if ($flag !== true)
  @include('templates.footer')
@endif