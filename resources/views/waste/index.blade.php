@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Waste Trap</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div id="map" style="width: 100%; height: 800px;">
         
        </div>
    </div>
  </div>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
<script>

  var map = L.map('map').setView([1.4655, 103.7578], 13);

  var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  <?php foreach ($Devices as $key => $value):?>

  L.marker([<?=$value->d_latitude?>, <?=$value->d_longitude?>]).addTo(map)
    .bindPopup('<b>Location Name :</b> <?=$value->d_location_name?> <br /> <b>Latitude :</b> <?=$value->d_latitude?> <br /> <b>Longitude :</b> <?=$value->d_longitude?>');

  <?php endforeach; ?>
  
  function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent('You clicked the map at ' + e.latlng.toString())
      .openOn(map);
  }

  map.on('click', onMapClick);

</script>
@endsection