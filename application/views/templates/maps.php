<?php $this->load->view('templates/js') ?>
<?php $this->load->view('templates/header') ?>



<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ;?>template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php $this->load->view('templates/meta') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php $this->load->view('templates/sidebar'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white";>
  
  
  <section class="content">
  
      <div class="container-fluid" >
              <h3>4DX MANTRI </h3>
                <div class="row"  >
                  <div class="col-md-6">
                  
                    <!-- Total Pencapaian CHART -->
                    <div class="card card-primarp"  >
                        <div class="card-header">
                           <h3 class="card-title"><b>Mapping Wilayah </b></h3>
                          <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <div id="map" style="width: 800px; height: 400px;"></div>
                          <!-- <script>
                            var map = L.map('map').setView([-6.807678, 110.842096], 14);
                            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);
                          </script> -->
                          <
                          <script>
                                  var curLocation=[0,0];
                                  if (curLocation[0]==0 && curLocation[1]==0) {
                                    curLocation =[-6.807678, 110.842096];	
                                  }

                                  var mymap = L.map('map').setView([-6.807678, 110.842096], 16);
                                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                        id: 'mapbox/streets-v11'
                                  }).addTo(mymap);


                                  mymap.attributionControl.setPrefix(false);
                                  var marker = new L.marker(curLocation, {
                                    draggable:'true'
                                  });

                                  marker.on('dragend', function(event) {
                                  var position = marker.getLatLng();
                                  marker.setLatLng(position,{
                                    draggable : 'true'
                                    }).bindPopup(position).update();
                                    $("#Latitude").val(position.lat);
                                    $("#Longitude").val(position.lng).keyup();
                                  });

                                  $("#Latitude, #Longitude").change(function(){
                                    var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
                                    marker.setLatLng(position, {
                                    draggable : 'true'
                                    }).bindPopup(position).update();
                                    mymap.panTo(position);
                                  });
                                  mymap.addLayer(marker);

                          </script>




                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    
                  </div>
                  <!-- /.col (LEFT) -->
                  <div class="col-md-6">
                    <!-- Item CHART -->
                    <div class="card card-infa">
                      <div class="card-header">
                        <h3 class="card-title"><b>Input Lokasi</b></h3>

                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>     
                        <table class="table">
                        <form action="<?php echo base_url()?>maps/create_action" method="post">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />

                                <label class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama Toko" value="" autocomplete="off"/> 
                                
                                <label class="form-label">Alamat</label>
                                <textarea  rows="2" type="text" required class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="" autocomplete="off"></textarea>                  
                                
                                <label class="form-label">No Hp</label>
                                <input maxlength="13" type="text" class="form-control" pattern="[0-9]+" required name="hp" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" autocomplete="off">
                                
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required id="email" placeholder="Email" value="<?php echo $email; ?>" autocomplete="off">
                                
                                <label class="form-label">Latitude</label>
                                <input type="text" name="latitude" id="Latitude" class="form-control" readonly placeholder="Latitude"/>

                                <label class="form-label">Longitude</label>
                                <input type="text" name="longitude" id="Longitude" class="form-control" readonly placeholder="Longitude"/>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="rek" id="rek" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Buka Rekening</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="brimo" id="brimo" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Brimo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qris" id="qris" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Qris</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="edc" id="edc" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">EDC</label>
                            </div>
                            <p></p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>              
                            
                        </table>    
                        </form>
 
  </section>
</div>


