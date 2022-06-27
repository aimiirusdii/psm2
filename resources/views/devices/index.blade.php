@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0 text-dark">All Devices</h1>
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ url('devices/create') }}"> Create New Device</a>
            </div>
        </div>
    </div>
    
   <br>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
          <th></th>
            <th>Serial No</th>
            <th>Name</th>
            <th>Location Name</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($Devices as $key => $Device)
        <tr>
          <td></td>
            <td>{{ $Device->d_serial_no }}</td>
            <td>{{ $Device->d_name }}</td>
            <td>{{ $Device->d_location_name }}</td>
            <td>{{ $Device->d_latitude }}</td>
            <td>{{ $Device->d_longitude }}</td>
            <td>
              @if($Device->d_status ==  'active')
                  <span class="badge badge-success">{{ $Device->d_status }}</span>
              @else
                  <span class="badge badge-danger">{{ $Device->d_status }}</span>
              @endif
            </td>
            <td>
                <form action="{{ url('devices/destroy',$Device->id) }}" method="POST">
                  {{-- <a class="btn btn-success" href="{{ url('devices/show',$Device->id) }}">View</a> --}}
                  <button type="button" class="btn btn-warning devicenoti" data-serial="{{$Device->d_serial_no}}"  onclick="goDoSomething(this);" data-toggle="modal" data-target="#modal-default{{$Device->id}}">
                  Send Alert
                </button>
                  <a class="btn btn-primary" href="{{ url('devices/edit',$Device->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" class="text-danger">Delete</button>
                </form>
            </td>
          </tr>

        <div class="modal fade" id="modal-default{{$Device->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Waste trap  <br>
                  <strong> Name : </strong> {{ $Device->d_name }} <br>
                  <strong> Location : </strong> {{ $Device->d_location_name }} <br>
                  is almost full. Cleaning process is required</p>
              </div>
              <div class="modal-footer justify-content-between">
                <a href="{{ url('/wastetrap') }}" class="btn btn-success" >Check Map</a>
                <a target="_blank" class="btn btn-primary" href="https://www.google.fr/maps/place/{{ $Device->d_location_name }}" > Go To Directions</a>
              </div>
            </div>
          </div>
        </div>

        @endforeach
    </tbody>
    </table>
  
    
</div>
</div>
</div>
</div>

<!-- The Modal -->


@endsection