
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
          <h5 style="color:white;"> Dashboard </h5>
          <a style="color:darkorange; href="#" class="d-block"><?php echo $this->session->userdata('nama_mantri');?></a>

        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <li class="nav-item">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Menu Unit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('home') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
                </li>
              <li class="nav-item">
                <a href="<?php echo site_url('home?kode=3409') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kota</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=3410') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Jati</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5921') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Bae</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5922') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Dawe</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5923') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Gebog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5924') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Gondosari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5926') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Mejobo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5927') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Ngetuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5928') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Ps Jember</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5929') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Undaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5930') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Wates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=5931') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Jekulo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=7059') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Jati2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=7542') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Gulang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('unit?kode=8122') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Colo</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
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
              <li class="nav-item">
                <a href="<?php echo site_url();?>qris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Qris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>brimo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brimo</p>
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