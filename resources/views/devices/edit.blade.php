@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Device</h1>
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
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form enctype="multipart/form-data" method="post" action="{{ url('/devices/update') }}">
         @csrf
          <input type="hidden" name="id" value="{{ $Devices->id }}">
        <div class="form-group">
              <label for="price">Serial No :</label>
              <input type="text" class="form-control" name="d_serial_no"  value="{{ $Devices->d_serial_no }}"/>
          </div>

          <div class="form-group">
              <label for="price">Name :</label>
              <input type="text" class="form-control" name="d_name"  value="{{ $Devices->d_name }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Location Name:</label>
              <input type="text" class="form-control" name="d_location_name"  value="{{ $Devices->d_location_name }}"/>
          </div>

          <div class="form-group">
              <label for="quantity">Latitude:</label>
              <input type="text" class="form-control" name="d_latitude"  value="{{ $Devices->d_latitude }}"/>
          </div>

          <div class="form-group">
              <label for="quantity">Longitude:</label>
              <input type="text" class="form-control" name="d_longitude"  value="{{ $Devices->d_longitude }}"/>
          </div>

          <div class="form-group">
              <label for="quantity">Status:</label>
              <select class="form-control select2" name="d_status" style="width: 100%;">
                  <option >{{ $Devices->d_status }}</option>
                  @if($Devices->d_status == 'active')
                    <option value="inactive">inactive</option> 
                  @else
                    <option value="active">active</option>
                  @endif
              </select>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
    </div>
  </div>
@endsection