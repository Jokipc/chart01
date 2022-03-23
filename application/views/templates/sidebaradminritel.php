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
        <h6 style="color:white;"> RM DANA </h6>
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
                <a href="<?php echo site_url();?>home/dana" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
           <li class="nav-item">
           <li class="nav-item">
                <a href="<?php echo site_url();?>rank/dana" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rank</p>
                </a>
              </li>
           <li class="nav-item">
  
            
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data RM DANA 1
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data BRIMO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>pkspayroll" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PKS PAYROLL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>edcmerchant" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EDC Merchant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>QRIS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>bankgaransi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Garansi</p>
                </a>
              </li>



              
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data RM DANA 2
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>rekgiro" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekening Giro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>rektab" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekening Tabungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>premi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BRILIFE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimolajs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BSB/Brimola/JunioSmart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>dgsaving" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Digital Saving</p>
                </a>
              </li>



              
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Ubah Password
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo site_url();?>user/update/<?php echo $this->session->userdata('id_pn');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Password</p>
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