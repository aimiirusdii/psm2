@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tablet "></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total Devices</span>
          <span class="info-box-number">
          {{$totalDevice}}
          </span>
          </div>

          </div>

          </div>

          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bell"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total Notification</span>
          <span class="info-box-number">{{$totalNotification}}</span>
          </div>

          </div>

          </div>


          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total Active Device</span>
          <span class="info-box-number">{{$totalDeviceActive}}</span>
          </div>

          </div>

          </div>

          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total Inactive Device</span>
          <span class="info-box-number">{{$totalDeviceInactive}}</span>
          </div>

          </div>

          </div>

          </div>

          <div class="row">
            <div class="col-12">
              <div class="card ">
              <div class="card-body">
              <table class="table table-bordered" id="table">
        <thead>
        <tr>
          <th></th>
            <th>Serial No</th>
            <th>Location Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($Devices as $key => $Device)
        <tr>
          <td></td>
            <td>{{ $Device->d_serial_no }}</td>
            <td>{{ $Device->d_location_name }}</td>
            <td>
                @if($Device->d_status ==  'active')
                    <span class="badge badge-success">{{ $Device->d_status }}</span>
                @else
                    <span class="badge badge-danger">{{ $Device->d_status }}</span>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
    </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #1e7bfe; color: white;">
                <h3 class="card-title">Total Alert Bar Chart (Monthly 2022)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
  </div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<script>
    var areaChartData = {
      labels  :  <?php echo json_encode($months);?>,
      datasets: [
        {
          label               : 'DA-002',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'DA-001',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

     new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
</script>
@endsection
