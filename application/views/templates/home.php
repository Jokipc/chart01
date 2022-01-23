
<?php $this->load->view('templates/header') ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ;?>template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <?php if($this->session->userdata('id_level')==='2'):?> 
  <!-- Navbar -->
 <?php $this->load->view('templates/meta') ?>
 

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <?php $this->load->view('templates/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <b style="color:orange" > Pencapaian</b>
          </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"" >
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px;" >
              <div class="inner">
                <h3>112%
                </h3>

                <p>Akuisisi Rekening</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px;" >
              <div class="inner">
                <h3>112%
                </h3>

                <p>Akuisisi Rekening</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px;" >
              <div class="inner">
                <h3>112%
                </h3>

                <p>Akuisisi Rekening</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px;" >
              <div class="inner">
                <h3>112%
                </h3>

                <p>Akuisisi Rekening</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px">
              <div class="inner">
                <h3>112
                </h3>

                <p>Mantri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px">
              <div class="inner">
                <h3>112
                </h3>

                <p>Mantri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px">
              <div class="inner">
                <h3>112
                </h3>

                <p>Mantri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:92px">
              <div class="inner">
                <h3>112
                </h3>

                <p>Mantri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
        </div>
     
        
    <div id="graph" style="position: relative; height: 420px; "> </div>
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        
        Morris.Bar({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'nama_mantri',
          xLabelAngle: 0,
          ykeys:  ['saving', 'qris'],
          labels: ['saving', 'qris'],
		  gridTextColor : ['black'],
		  barColors : ['CadetBlue','orange','blue','red','yello','black','orange'] 
        });
    </script>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
 

<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view('templates/js') ?>
</body>
</html>
<?php else: ?>
<?php redirect(site_url('login')); ?>

<?php endif;?>
