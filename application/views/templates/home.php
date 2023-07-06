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
          <div class="col-md-6"  >
          
            <!-- Total Pencapaian CHART -->
            <div class="card card-primarp"  >
              <div class="card-header">
                <h3 class="card-title"><b>Total Pencapaian </b></h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
              
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <?php $this->load->view('chart1') ?>
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- Item CHART -->
            <div class="card card-infa">
              <div class="card-header">
                <h3 class="card-title">Item Pencapaian</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                
                    
                 
                <?php
                    $merchanttarget = $this->session->userdata('merchant');
                    $bmerchant = $this->session->userdata('bmerchant');
                    
                    $merchantmax = ($merchanttarget * 130 ) / 100;
                    if ($data_merchant > $merchantmax ){
                      $merchantpersen = 130 ;
                      $merchantbar = 130 ;
                    }else{
                      $merchantpersen = ($data_merchant/$merchanttarget)*($bmerchant/$merchanttarget) ;
                      $merchantbar = ($data_merchant/$merchanttarget)*100 ;
                    }
                    

                    ?>
                    <?php
                        $a = 0; 
                        foreach($volume as $val) {
                            $a += $val->sales_volume;
                        }
                        $data_sales=$a;
                    ?>
                    <?php
                    $salestarget = $this->session->userdata('sales');
                    $bsales = $this->session->userdata('bsales');
                    $salesmax= ($salestarget * 130 ) / 100;
                    if($data_sales > $salesmax){
                      $salespersen = 130 ;
                      $salesbar = 130 ;
                    }else{
                      $salespersen = ($data_sales/$salestarget)*($bsales/$salestarget) ;
                      $salesbar = ($data_sales/$salestarget)*100 ;
                    }
                   
                  
                    ?>
                    <?php
                        $b = 0; 
                        foreach($saldoku as $val) {
                            $b += $val->saldo;
                        }
                        $data_saldo=$b;
                    ?>
                    <?php
                    $saldotarget = $this->session->userdata('saldo');
                    $bsaldo = $this->session->userdata('bsaldo');
                    $saldomax= ($saldotarget * 130 ) / 100;
                    if($data_saldo > $saldomax){
                      $saldopersen = 130;
                      $saldobar = 130 ;
                    }else{
                      $saldopersen = ($data_saldo/$saldotarget)*($saldo/$saldotarget) ;
                      $saldobar = ($data_saldo/$saldotarget)*100 ;
                    }                   
                    
                    

                   
                    ?>
                    <div class="progress-group">
                      Total Akuisisi QRIS <?= number_format($merchantbar,2),'%' ; ?> 
                      <span class="float-right"><b><?= number_format($data_merchant); ?></b>/ <?php echo $this->session->userdata('merchant');?></span>                 
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width:  <?= number_format($merchantbar,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Sales Volume <?= number_format($salesbar,2),'%' ; ?>
                      <span class="float-right"><b><?= number_format($data_sales); ?></b>/<?php echo number_format($this->session->userdata('sales'));?></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-info " style="width:<?= number_format($salesbar,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Saldo <?= number_format($saldobar,2),'%' ; ?></span>
                      <span class="float-right"><b><?= number_format($data_saldo); ?></b>/<?php echo number_format($this->session->userdata('saldo'));?></span>
                      <div class="progress progress-sm">
                       <div class="progress-bar bg-success" style="width:<?= number_format($saldobar,2),'%' ;R ?>"></div>
                      </div></div>                   
                    <!-- /.progress-group -->
                    
                    
    </section>
     <?php
     
        $total_brimo = 0;
        $total_qris = 0;
        $total_target = 0;
        foreach($data_hitung as $val) {
            $total_brimo += $val->tbrimo;
            $total_qris += $val->tqris;
            $total_target += $val->target;
           
            //echo $val->plafon;
        }
        $percent_target = ($total_plafon/$total_target) * 100;
     ?>

    

</body>
</html>
