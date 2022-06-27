@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Device</h1>
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
      <form enctype="multipart/form-data" method="post" action="{{ url('/devices/store') }}">
         @csrf
         
        <div class="form-group">
              <label for="price">Serial No :</label>
              <input type="text" class="form-control" name="d_serial_no"/>
          </div>

          <div class="form-group">
              <label for="price">Name :</label>
              <input type="text" class="form-control" name="d_name"/>
          </div>
          <div class="form-group">
              <label for="quantity">Location Name:</label>
              <input type="text" class="form-control" name="d_location_name"/>
          </div>

          <div class="form-group">
              <label for="quantity">Latitude:</label>
              <input type="text" class="form-control" name="d_latitude"/>
          </div>

          <div class="form-group">
              <label for="quantity">Longitude:</label>
              <input type="text" class="form-control" name="d_longitude"/>
          </div>

          <div class="form-group">
              <label for="quantity">Status:</label>
              <select class="form-control select2" name="d_status" style="width: 100%;">
                  <option >Please Select Status</option>
                  <option value="active">active</option>
                  <option value="inactive">inactive</option> 
              </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
    </div>
  </div>
@endsection