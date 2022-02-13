<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ;?>template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <br>
          <img src="<?php echo base_url() ;?>template/dist/img/<?php echo $this->session->userdata('ico');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <h6 style="color:white;"> Unit 4DX </h6>
          <a href="#" style="color:orange" class="d-block"><?php echo $this->session->userdata('nama_mantri');?></a>

        </div>
      </div>

     

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item"> 
              
        

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Rank
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?php echo site_url();?>rank/bintang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>  
                <a href="<?php echo site_url();?>rank/live" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Live</p>
                </a>
              
              <a href="<?php echo site_url();?>rank/unit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit</p>
                </a>
                
                 
                  <a href="<?php echo site_url('rank') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>&nbsp; Rank Mantri
                  </a>
                  
              </li>
            </ul>
          </li>

         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Mantri 1
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>saving" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Saving</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Qris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Brimo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>kunjual" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kunjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>stroberikasir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Stroberi<p>
                </a>
              </li>
            </ul>
          </li>

          
       

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>