
      <?php
        $e = 0; 
        foreach($bankgaransi as $val) {
            $e += $val->plafond;
        }
        $e_hsl = $e/1000000;
     ?>
     <?php 
        $h = 0; 
        foreach($premi as $val) {
            $h += $val->plafond;
        }
        $h_hsl = $h/1000000;
     ?>
     
     <?php foreach($target as $val) : ?>
      <?php 
      $ba = $val->bbrimo ;      
      $bb =	$val->b_payrol;
      $bc =	$val->b_edc;  
      $bd = $val->bqris;
      $be = $val->b_bankgaransi;
      $bf = $val->b_giro;   
      $bg = $val->b_tabungan;
      $bh = $val->b_premi;
      $bi = $val->b_brimola;
      $bj = $val->b_digitalsav;
      ?>
          
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

<?php $this->load->view('templates/sidebaradminritel'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white";>
   
  
  <section class="content">
  
      <div class="container-fluid" >
      <h5>4DX RM DANA </h5>
        <div class="row"  >
          <div class="col-md-6"  >
          
            <!-- Total Pencapaian CHART -->
            <div class="card card-primarp"  >
              <div class="card-header">
                <h5 class="card-"><b>Total Pencapaian </b></h5>
               
         
     
                <div class="card-tools">
                <div> Bobot :
<p align="justify"> Brimo : <?= $ba ; ?> %,&nbsp&nbsp Pks Payroll : <?= $bb ; ?>%,&nbsp&nbsp EDC Merchant : <?= $bc ; ?>%,&nbsp&nbsp Qris : <?= $bd ; ?>%
,&nbsp&nbsp Bank Garansi : <?= $be ; ?>%,&nbsp&nbsp Rek Giro : <?= $bf ; ?>%,&nbsp&nbsp Rek Simpanan : <?= $bg ; ?>%,&nbsp&nbsp Pijar/Davestera : <?= $bh ; ?>%
,&nbsp&nbsp BSB/BRIMOLA/JunioSmart : <?= $bi ; ?>%,&nbsp&nbsp Dig. Saving : <?= $bj ; ?>%
</p></div>
                </div>
              </div>
              <div class="card-body">
              
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <?php $this->load->view('chart3') ?>
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
              $ta = $val->brimo ;
              $barbrimo = ($brimo/$ta) * 100; 
              if($brimo > 110){ 
                $barbrimo1 = 110; }else{
                $barbrimo1 = $barbrimo;}

              $tb = $val->t_payrol;
              $barpayrol= ($pks/$tb)*100;
              if($barpayrol > 110){ 
                $barpayrol1 = 110; }else{
                $barpayrol1 = $barpayrol;}

              $tc = $val->t_edc;
              $baredc = ($edc/$tc)*100;
              if($baredc > 110){ 
                $baredc1 = 110; }else{
                $baredc1 = $baredc;}

              $td = $val->qris;
              $barqris = ($qris/$td)*100;
              if($barqris > 110){ 
                $barqris1 = 110; }else{
                $barqris1 = $barqris;}

              $te = $val->t_bankgaransi;
              $barbankgaransi = ($e/$te)*100;
              if($barbankgaransi > 110){ 
                $barbankgaransi1 = 110; }else{
                $barbankgaransi1 = $barbankgaransi;}

              $tf = $val->t_giro;
              $barrekgiro = ($giro/$tf)*100;
              if($barrekgiro > 110){ 
                $barrekgiro1 = 110; }else{
                $barrekgiro1 = $barrekgiro;}
              
              $tg = $val->t_tabungan;
              $bartabungan = ($tab/$tg)*100;
              if($bartabungan > 110){ 
                $bartabungan1 = 110; }else{
                $bartabungan1 = $bartabungan;}

              $th = $val->t_pemi;
              $barpremi = ($h/$th)*100;
              if($barpremi > 110){ 
                $barpremi1 = 110; }else{
                $barpremi1 = $barpremi;}

              $ti = $val->t_brimola;
              $barbrimola= ($brimola/$ti)*100;
              if($barbrimola > 110){ 
                $barbrimola1 = 110; }else{
                $barbrimola1 = $barbrimola;}

              $tj = $val->t_digitalsav;
              $bardigitalsav = ($dgsaving/$tj)*100;
              if($bardigitalsav > 110){ 
                $bardigitalsav1 = 110; }else{
                $bardigitalsav1 = $bardigitalsav;}

       ?>
                    <div class="progress-group">
                      
                      Total Brimo <?= number_format($barbrimo1,2),'%' ; ?> 
                      <span class="float-right"><b><?php echo $brimo; ?></b>/<b><?php  echo $val->brimo; ?></b> </span>                 
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width:  <?php echo $brimo,'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total PKS Payroll <?= number_format($barpayrol1,2),'%' ; ?>
                      <span class="float-right"><b><?php echo $pks; ?></b>/<b><?php  echo $val->t_payrol; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-info " style="width:<?= number_format($barpayrol1,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total EDC Merchant <?= number_format($baredc1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $edc; ?></b>/<b><?php  echo $val->t_edc; ?></b></span>
                      <div class="progress progress-sm">
                       <div class="progress-bar bg-success" style="width:<?= number_format($baredc1,2),'%' ;R ?>"></div>
                      </div></div>                   
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total QRIS <?= number_format($barqris1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $qris ; ?></b>/<b><?php  echo $val->qris; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width:<?= number_format($barqris1,2),'%' ;R ?>"></div>
                      </div></div>
                       <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Bank Garansi <?= number_format($barbankgaransi1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($e_hsl); ?></b>/<b><?php  echo $val->t_bankgaransi/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:gold;width:<?= number_format($barbankgaransi1,2),'%' ;R   ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Rek Giro <?= number_format($barrekgiro1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $giro; ?></b>/<b><?php  echo $val->t_giro; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar" style="background-color:darksalmon; width:<?= number_format($barrekgiro1,2),'%' ;R ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Rek Tabungan<?= number_format($bartabungan1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $tab; ?></b>/<b><?php  echo $val->t_tabungan; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:cadetblue; width:<?= number_format($bartabungan1,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Brilife<?= number_format($barpremi1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($h_hsl); ?></b>/<b><?php  echo $val->t_pemi/1000000; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:darkgreen;width:<?= number_format($barpremi1,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Total BSB/BRIMOLA/JunioSmart <?= number_format($barbrimola1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $brimola; ?></b>/<b><?php  echo $val->t_brimola; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:greenyellow;width:<?= number_format($barbrimola1,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Total Digital Saving <?= number_format($bardigitalsav1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $dgsaving; ?></b>/<b><?php  echo $val->t_digitalsav; ?></b> </span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:sandybrown;width:<?= number_format($bardigitalsav1,2),'%' ;R ?>"></div>
                      </div></div>  
                       <!-- /.progress-group -->

                       <?php endforeach; ?>
</section>
</div>

</body>
</html>
