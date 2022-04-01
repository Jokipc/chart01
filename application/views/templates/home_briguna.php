
      <?php
        $a = 0; 
        foreach($briguna as $val) {
            $a += $val->plafond;
        }
        $a_hsl = $a/1000000;
     ?>
     <?php 
        $f = 0; 
        foreach($premi as $val) {
            $f += $val->plafond;
        }
        $f_hsl = $f/1000000;
     ?>

      <?php 
        $g = 0; 
        foreach($ekstrakom as $val) {
            $g += $val->plafond;
        }
        $g_hsl = $g/1000000;
     ?>
     
     <?php foreach($target as $val) : ?>
      
      <?php 
      $ba = $val->b_briguna ;      
      $bb =	$val->b_debbriguna;
      $bc =	$val->b_kk;  
      $bd = $val->bbrimo;
      $be = $val->b_digitalsav;
      $bf = $val->b_premi;   
      $bg = $val->b_ekstrakom;
      
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

<?php $this->load->view('templates/sidebarbriguna'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white";>
   
  
  <section class="content">
  
      <div class="container-fluid" >
      <h5>4DX RM Briguna </h5>
        <div class="row"  >
          <div class="col-md-6"  >
          
            <!-- Total Pencapaian CHART -->
            <div class="card card-primarp"  >
              <div class="card-header">
                <h5 class="card-"><b>Total Pencapaian </b></h5>
               
         
     
                <div class="card-tools">
                
                </div>
              </div>
              <div class="card-body">
              
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                
                <?php $this->load->view('chart4') ?>
      <div class="container">

			<div class="row" align="center">
				<canvas id="canvas" width="100" height="110"></canvas>
				
			</div>
			
		  </div>
      <table style="font-size:12 ; word-spacing: -2px;" width=100% >Bobot :
			<td style="background-color:#007bff">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $ba; ?>%</td><td></td>
			<td style="background-color:#17a2b8">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $bb; ?>%</td><td></td>
			<td style="background-color:#28a745">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $bc; ?>%</td><td></td>
			<td style="background-color:#ffc107">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo number_format($bd,0); ?>%</td><td></td>
			<td style="background-color:gold">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo number_format($be); ?>%</td><td></td>
			<td style="background-color:darksalmon;">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $bf; ?>%</td><td></td>
			<td style="background-color:cadetblue">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $bg; ?>%</td><td></td>
		  </table> 
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
              $ta = $val->t_briguna ;
              $barbriguna = ($a/$ta) * 100; 
              if($barbriguna > 110){ 
                $barbriguna1 = 110; }else{
                $barbriguna1 = $barbriguna;}

              $tb = $val->t_debbriguna;
              $bardeb= ($deb/$tb)*100;
              if($bardeb > 110){ 
                $bardeb1 = 110; }else{
                $bardeb1 = $bardeb;}

              $tc = $val->t_kk;
              $barkk = ($kk/$tc)*100;
              if($barkk > 110){ 
                $barkk1 = 110; }else{
                $barkk1 = $barkk;}

              $td = $val->brimo;
              $barbrimo = ($brimo/$td)*100;
              if($barbrimo > 110){ 
                $barbrimo1 = 110; }else{
                $barbrimo1 = $barbrimo;}

              $te = $val->t_digitalsav;
              $bardgsaving = ($dgsaving/$te)*100;
              if($bardgsaving > 110){ 
                $bardgsaving1 = 110; }else{
                $bardgsaving1 = $bardgsaving;}

              $tf = $val->t_pemi;
              $barpremi = ($f/$tf)*100;
              if($barpremi > 110){ 
                $barpremi1 = 110; }else{
                $barpremi1 = $barpremi;}
              
              $tg = $val->t_ekstrakom;
              $barekstrakom = ($g/$tg)*100;
              if($barekstrakom > 110){ 
                $barekstrakom1 = 110; }else{
                $barekstrakom1 = $barekstrakom;}

       ?>
       
                    <div class="progress-group">
                      
                      Total Briguna <?= number_format($barbriguna1,2),'%' ; ?> 
                      <span class="float-right"><b><?php echo number_format($a_hsl); ?></b>/<b><?php  echo number_format($val->t_briguna/1000000); ?>JT</b> </span>                 
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width:  <?= number_format($barbriguna1,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Debitur <?= number_format($bardeb1,2),'%' ; ?>
                      <span class="float-right"><b><?php echo $deb; ?></b>/<b><?php  echo $val->t_debbriguna; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-info " style="width:<?= number_format($bardeb1,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Kartu Kredit <?= number_format($barkk1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $kk; ?></b>/<b><?php  echo $val->t_kk ?></b></span>
                      <div class="progress progress-sm">
                       <div class="progress-bar bg-success" style="width:<?= number_format($barkk1,2),'%' ;R ?>"></div>
                      </div></div>                   
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Brimo <?= number_format($barbrimo1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $brimo ; ?></b>/<b><?php  echo $val->brimo; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width:<?= number_format($barbrimo1,2),'%' ;R ?>"></div>
                      </div></div>
                       <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Digital Saving <?= number_format($bardgsaving1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $dgsaving ; ?></b>/<b><?php  echo $val->t_digitalsav; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:gold;width:<?= number_format($bardgsaving1,2),'%' ;R   ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Brilife <?= number_format($barpremi1,2),'%' ; ?></span>
                      <span class="float-right"><?php echo number_format($f_hsl); ?></b>/<b><?php  echo $val->t_pemi/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar" style="background-color:darksalmon; width:<?= number_format($barpremi1,2),'%' ;R ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Rek Ekstrakom <?= number_format($barekstrakom1,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($g_hsl); ?></b>/<b><?php  echo number_format($val->t_ekstrakom/1000000); ?>JT</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:cadetblue; width:<?= number_format($barekstrakom1,2),'%' ;R ?>"></div>
                      </div></div>  
                       <!-- /.progress-group -->

                       <?php endforeach; ?>
</section>
</div>

</body>
</html>
