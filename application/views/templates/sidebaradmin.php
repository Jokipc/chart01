

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
        <h6 style="color:white;"> Dashboard 4DX Admin </h6>
          <a href="#" style="color:orange" class="d-block"><?php echo $this->session->userdata('nama_mantri');?></a>

        </div>
      </div>

     

      <!-- Sidebar Menu -->
      
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
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url();?>saving/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Saving</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Qris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimo/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brimo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>kunjual/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kunjual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>stroberikasir/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stroberi Kasir<p>
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