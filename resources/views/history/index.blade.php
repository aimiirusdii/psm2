@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0 text-dark">History</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
       <div class="container-fluid">
      <div class="card ">
  <div class="card-body">
    
   <br>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
          <th></th>
            <th>Serial No</th>
            <th>Logs</th>
            <th>Alert Time</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($History as $key => $value)
        <tr>
          <td></td>
            <td>{{ $value->d_serial_no }}</td>
            <td>{{ $value->h_logs }}</td>
            <td>{{ $value->created_at }}</td>
          </tr>
        @endforeach
    </tbody>
    </table>
  
    
</div>
</div>
</div>
</div>

<!-- The Modal -->


@endsection