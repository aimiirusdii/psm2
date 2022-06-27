@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View User</h1>
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
      <form enctype="multipart/form-data" method="post" action="{{ url('/user/update') }}">
         @csrf
         <input type="hidden" name="user_id" value="{{ $User->id }}">

         

      <div class="form-group">
              <label for="profile_photo_path">Profile :</label><br>
             <img src="{{URL::asset('/uploads/'.'/'.$User->profile_photo_path)}}" style="width: 30%;">
              <!-- <input type="file" class="form-control" name="profile_photo_path" id="profile_photo_path" disabled> -->
          </div>
         

        <div class="form-group">
              <label for="price">Name :</label>
              <input type="text" class="form-control" name="name"  value="{{ $User->name }}" disabled/>
          </div>

     
          <div class="form-group">
              <label for="price">Email :</label>
              <input type="email" class="form-control" name="email"  value="{{ $User->email }}" disabled/>
          </div>
          <div class="form-group">
              <label for="quantity">Password:</label>
              <input type="password" class="form-control" name="password"  value="{{ $User->password }}"disabled/>
          </div>

          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
      </form>
  </div>
</div>
    </div>
  </div>
@endsection