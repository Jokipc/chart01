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
                    $savingtarget = $this->session->userdata('saving');
                    $bsaving = $this->session->userdata('bsaving');
                    $savingpersen = ($data_saving/$savingtarget)*($bsaving/$savingtarget) ;
                    $savingbar = ($data_saving/$savingtarget)*100 ;

                    $brimotarget = $this->session->userdata('brimo');
                    $bbrimo = $this->session->userdata('bbrimo');
                    $brimopersen = ($data_brimo/$brimotarget)*($bbrimo/$brimotarget) ;
                    $brimobar = ($data_brimo/$brimotarget)*100 ;

                    $qristarget = $this->session->userdata('qris');
                    $bqris = $this->session->userdata('bqris');
                    $qrispersen = ($data_qris/$qristarget)*($bqris/$qristarget) ;
                    $qrisbar = ($data_qris/$qristarget)*100 ;

                    $kunjualtarget = $this->session->userdata('kunjual');
                    $bkunjual = $this->session->userdata('bkunjual');
                    $kunjualpersen = ($data_kunjual/$kunjualtarget)*($bkunjual/$kunjualtarget) ;
                    $kunjualbar = ($data_kunjual/$kunjualtarget)*100 ;

                    $stroberitarget = $this->session->userdata('stroberikasir');
                    $bstroberikasir = $this->session->userdata('bstroberikasir');
                    $stroberipersen = ($data_stroberikasir/$stroberitarget)*($bstroberikasir/$stroberitarget) ;
                    $stroberibar = ($data_stroberikasir/$stroberitarget)*100 ;

                    $umitarget = $this->session->userdata('umi');
                    $bumi = $this->session->userdata('bumir');
                    $umipersen = ($umi/$umitarget)*($bumi/$umitarget) ;
                    $umibar = ($umi/$umitarget)*100 ;

                   
                    ?>
                    <div class="progress-group">
                      Total Akuisisi saving <?= number_format($savingbar,2),'%' ; ?> 
                      <span class="float-right"><b><?= number_format($data_saving); ?></b>/ <?php echo $this->session->userdata('saving');?></span>                 
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width:  <?= number_format($savingbar,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Akuisisi Brimo <?= number_format($brimobar,2),'%' ; ?>
                      <span class="float-right"><b><?= number_format($data_brimo); ?></b>/<?php echo $this->session->userdata('brimo');?></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-info " style="width:<?= number_format($brimobar,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Akuisisi Qris <?= number_format($qrisbar,2),'%' ; ?></span>
                      <span class="float-right"><b><?= number_format($data_qris); ?></b>/<?php echo $this->session->userdata('qris');?></span>
                      <div class="progress progress-sm">
                       <div class="progress-bar bg-success" style="width:<?= number_format($qrisbar,2),'%' ;R ?>"></div>
                      </div></div>                   
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Akuisisi kunjual <?= number_format($kunjualbar,2),'%' ; ?></span>
                      <span class="float-right"><b><?= number_format($data_kunjual); ?></b>/<?php echo $this->session->userdata('kunjual');?></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width:<?= number_format($kunjualbar,2),'%' ;R ?>"></div>
                      </div></div>
                       <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Stroberi Kasir / Tagihan <?= number_format($stroberibar,2),'%' ; ?></span>
                      <span class="float-right"><b><?= number_format($data_stroberikasir); ?></b>/<?php echo $this->session->userdata('stroberikasir');?></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-danger" style="width:<?= number_format($stroberibar,2),'%' ;R ?>"></div>
                      </div></div>
                       <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Deb Umi <?= number_format($umibar,2),'%' ; ?></span>
                      <span class="float-right"><b><?= number_format($umi); ?></b>/<?php echo $this->session->userdata('umi');?></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar" style="background-color:yellow; width:<?= number_format($umibar,2),'%' ;R ?> "></div>
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
