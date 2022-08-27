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
                          <script>
                            var map = L.map('map').setView([51.505, -0.09], 13);
                            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                              maxZoom: 19,
                              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);
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
                        <h3 class="card-title">Input Lokasi</h3>

                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>     
                        <table class="table">
                            <div class="mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>                  
                                <label class="form-label">No Hp</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <label class="form-label">Longitude</label>
                                  <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                <label class="form-label">Latitude</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Buka Rekening</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Brimo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Qris</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">EDC</label>
                            </div>
                            <p></p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                              <button class="btn btn-primary" type="button">Simpan</button>
                            </div>

                          
                            
                        </table>    
                        
 
  </section>
</div>


