@extends('admin.master.masteradmin')

@section('css')
  @parent
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
        

    
      <div class="row">
         

          <div class="col-lg-3 col-6"  style="margin-left:50px; " >
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @foreach($dem2 as $item)
                <h3>{{$item->dem}}</h3>
                @endforeach
                

                <p>Cuộc hẹn theo ngày</p>
              </div>
              <div class="icon">
                <i class="fas fa-briefcase-medical"></i>
              </div>
              <a href="cuochen/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6" style="margin-left:100px; ">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                @foreach($dem1 as $item)
                <h3>{{$item->dem}}</h3>
                @endforeach
                

                <p>Cuộc hẹn theo tháng</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-nurse"></i>
              </div>
              <a href="cuochen/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6"  style="margin-left:100px; ">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                @foreach($dem3 as $item)
                <h3>{{$item->dem}}</h3>
                @endforeach
                

                <p>Tất cả cuộc hẹn trong năm 2021</p>
              </div>
              <div class="icon">
                <i class="fa fa-hospital-o" aria-hidden="true"></i>
              </div>
              <a href="cuochen/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>

          
          {{-- <h1>Highcharts in Laravel 8 Example</h1> --}}
          <h1 style="text-align: center;margin-top:40px;color:red">BIỂU ĐỒ THỐNG KÊ CUỘC HẸN THEO THÁNG</h1>
          <div id="chart-container"></div>
          

          <script src="https://code.highcharts.com/highcharts.js"></script>

          <script>
              var datas = <?php echo json_encode($datas)?>

              Highcharts.chart('chart-container', {
                  title: {
                      text: 'Appointment, 2021'
                  },
                  subtitle: {
                      text: 'Source: positronx.io'
                  },
                  xAxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep',
                          'Oct', 'Nov', 'Dec'
                      ]
                  },
                  yAxis: {
                      title: {
                          text: 'Number of Appointment'
                      }
                  },
                  legend: {
                      layout: 'vertical',
                      align: 'right',
                      verticalAlign: 'middle'
                  },
                  plotOptions: {
                      series: {
                          allowPointSelect: true
                      }
                  },
                  series: [{
                      name: 'Appointment',
                      data: datas
                  }],
                  responsive: {
                      rules: [{
                          condition: {
                              maxWidth: 500
                          },
                          chartOptions: {
                              legend: {
                                  layout: 'horizontal',
                                  align: 'center',
                                  verticalAlign: 'bottom'
                              }
                          }
                      }]
                  }
              });

          </script>



@endsection