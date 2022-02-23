
<?php
        $a = 0; 
        foreach($bankgaransi as $val) {
            $a += $val->plafond;
        }
        $a_hsl = $a/1000000;
     ?>
     <?php 
        $e = 0; 
        foreach($premi as $val) {
            $e += $val->plafond;
        }
        $e_hsl = $e/1000000;
     ?>
     <?php 
        $f = 0; 
        foreach($penyaluran as $val) {
            $f += $val->plafond;
        }
        $f_hsl = $f/1000000;
     ?>
     <?php 
        $i = 0; 
        foreach($kecil as $val) {
            $i += $val->plafond;
        }
        $i_hsl = $i/1000000;
     ?>
     <?php 
        $j = 0; 
        foreach($ekstrakom as $val) {
            $j += $val->plafond;
        }
        $j_hsl = $j/1000000;
     ?>
     <?php foreach($target as $val) : ?>
      <?php 
      $ba = $val->b_bankgaransi ;      
      $bb =	$val->b_bristore;
      $bc =	$val->b_ibbiz;  
      $bd = $val->b_britama;
      $be = $val->b_premi;
      $bf = $val->b_penyalurankur;   
      $bg = $val->bbrimo;
      $bh = $val->bqris;
      $bi = $val->b_realkecil;
      $bj = $val->b_ekstrakom;
      ?>
          
<?php $this->load->view('templates/header') ?>



<div class="wrapper">

 

  <!-- Navbar -->
 <?php $this->load->view('templates/meta') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

<?php $this->load->view('templates/sidebarritel'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white";>
   
  
  <section class="content">
  
      <div class="container-fluid" >
      <h5>4DX MANTRI </h5>
        <div class="row"  >
          <div class="col-md-6"  >
          
            <!-- Total Pencapaian CHART -->
            <div class="card card-primarp"  >
              <div class="card-header">
                <h5 class="card-"><b>Total Pencapaian </b></h5>
               
         
     
                <div class="card-tools">
                <div> Bobot :
<p align="justify"> Bankgaransi : <?= $ba ; ?> %,&nbsp&nbsp Bristore : <?= $bb ; ?>%,&nbsp&nbsp Ibbiz : <?= $bc ; ?>%,&nbsp&nbsp Britamabisnis : <?= $bd ; ?>%
,&nbsp&nbsp Pijar/Davestera : <?= $be ; ?>%,&nbsp&nbsp Penyaluran Kur : <?= $bf ; ?>%,&nbsp&nbsp Brimo : <?= $bg ; ?>%,&nbsp&nbsp Qris : <?= $bh ; ?>%
,&nbsp&nbsp Realkecil : <?= $bi ; ?>%,&nbsp&nbsp Rec Ekstrakom : <?= $bj ; ?>%
</p></div>
                </div>
              </div>
              <div class="card-body">
              
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <?php $this->load->view('chart2') ?>
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
              $ta = $val->t_bankgaransi ;
              $bargaransi = ($a/$ta) * 100; 

              $tb = $val->t_bristore;
              $barbristore= ($bristore/$tb)*100;

              $tc = $val->t_ibbiz;
              $baribbiz = ($ibbiz/$tc)*100;

              $td = $val->t_britama;
              $barbritama = ($d_hsl/$td)*100;

              $te = $val->t_pemi;
              $barpremi = ($e/$te)*100;

              $tf = $val->t_penyalurankur;
              $barkur = ($f/$tf)*100;
              
              $tg = $val->brimo;
              $barbrimo = ($brimo/$tg)*100;

              $th = $val->qris;
              $barqris = ($qris/$th)*100;

              $ti = $val->t_realkeci;
              $barkecil = ($i/$ti)*100;

              $tj = $val->t_ekstrakom;
              $barekstrakom = ($j/$tj)*100;

       ?>
                    <div class="progress-group">
                      
                      Total Bank Garansi <?= number_format($bargaransi,2),'%' ; ?> 
                      <span class="float-right"><b><?php echo number_format($a_hsl); ?></b>/<b><?php  echo $val->t_bankgaransi/1000000; ?></b> Jt</span>                 
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width:  <?= number_format($bargaransi,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Bristore <?= number_format($barbristore,2),'%' ; ?>
                      <span class="float-right"><b><?php echo $bristore; ?></b>/<b><?php  echo $val->t_bristore; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-info " style="width:<?= number_format($barbristore,2),'%' ;R ?>"></div>
                      </div></div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total IBBIZ <?= number_format($baribbiz,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $ibbiz; ?></b>/<b><?php  echo $val->t_ibbiz; ?></b></span>
                      <div class="progress progress-sm">
                       <div class="progress-bar bg-success" style="width:<?= number_format($baribbiz,2),'%' ;R ?>"></div>
                      </div></div>                   
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Britama Bisnis <?= number_format($barbritama,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($d_hsl); ?></b>/<b><?php  echo $val->t_britama; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width:<?= number_format($barbritama,2),'%' ;R ?>"></div>
                      </div></div>
                       <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Pijar/Davestera <?= number_format($barpremi,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($e_hsl); ?></b>/<b><?php  echo $val->t_pemi/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:gold;width:<?= number_format($barpremi,2),'%' ;R ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Penyaluran Kur<?= number_format($barkur,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($f_hsl); ?></b>/<b><?php  echo $val->t_penyalurankur/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar" style="background-color:darksalmon; width:<?= number_format($barkur,2),'%' ;R ?>"></div>
                      </div></div>
                    <div class="progress-group">
                      <span class="progress-text">Total Brimo<?= number_format($barbrimo,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $brimo; ?></b>/<b><?php  echo $val->brimo; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:cadetblue; width:<?= number_format($barbrimo,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Total Qris <?= number_format($barqris,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo $qris; ?></b>/<b><?php  echo $val->qris; ?></b></span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:darkgreen;width:<?= number_format($barqris,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Total Real Kecil <?= number_format($barkecil,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($i_hsl); ?></b>/<b><?php  echo $val->t_realkeci/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:greenyellow;width:<?= number_format($barkecil,2),'%' ;R ?>"></div>
                      </div></div>  
                    <div class="progress-group">
                      <span class="progress-text">Total Rec Ektrakom <?= number_format($barekstrakom,2),'%' ; ?></span>
                      <span class="float-right"><b><?php echo number_format($j_hsl); ?></b>/<b><?php  echo $val->t_ekstrakom/1000000; ?></b> Jt</span>
                      <div class="progress progress-sm">
                      <div class="progress-bar " style="background-color:sandybrown;width:<?= number_format($barekstrakom,2),'%' ;R ?>"></div>
                      </div></div>  
                       <!-- /.progress-group -->

                       <?php endforeach; ?>
</section>
</div>

</body>
</html>
