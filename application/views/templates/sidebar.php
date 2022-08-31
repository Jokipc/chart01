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
        <h6 style="color:white;"> Mantri 4DX </h6>
          <a href="#" style="color:orange" class="d-block"><?php echo $this->session->userdata('nama_mantri');?></a>

        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <li class="nav-item">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item"> 
              
         <a href="<?php echo site_url('home') ?>" class="nav-link ">
         <i class="far fa-circle nav-icon"></i> &nbsp; PENCAPAIAN
         </a>
         <a href="<?php echo site_url('rank') ?>" class="nav-link ">
         <i class="far fa-circle nav-icon"></i>&nbsp; RANK
         </a>
         <!-- <a href="<?php echo site_url('maps') ?>" class="nav-link ">
         <i class="far fa-circle nav-icon"></i>&nbsp; MAPS
         </a> -->
         
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Form
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>saving" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Saving</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
              <a href="<?php echo site_url();?>brimo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BRIMO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>QRIS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>kunjual" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kunjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>stroberikasir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stroberi Kasir/Tagihan</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?php echo site_url();?>umi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deb Umi</p>
                </a>
              </li>
              
  
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>user/update/<?php echo $this->session->userdata('id_pn');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>