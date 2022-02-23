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
        <h6 style="color:white;"> RM SME 4DX </h6>
          <a href="#" style="color:orange" class="d-block"><?php echo $this->session->userdata('nama_mantri');?></a>

        </div>
      </div>

     

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="<?php echo site_url();?>home/ritel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Form 1
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>bankgaransi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Garansi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>bristore" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bristore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>IBBIZ" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IBBIZ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>britamabisnis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Britama Bisnis Via DS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>premi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Premi PIJAR/DAVESTERA<p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Form 2
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>penyalurankur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyaluran Kur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brimo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Qris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>realkecil" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Real Kecil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>ekstrakom" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rec Ekstrakom<p>
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