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
			
              $persen = 110/100 ; 

			  $ba = $val->bbrimo ;      
              $ta = $val->brimo ;
              $barbrimo = ($brimo/$ta) * $ba; 
			  if($barbrimo>$ba){
					$asen = $ba * $persen ;
				}else{ $asen = $barbrimo ;}

			  $bb =	$val->b_payrol;
              $tb = $val->t_payrol;
              $barpks= ($pks/$tb)* $bb;
			  if($barpks>$bb){
					$bsen = $bb * $persen;
				}else{ $bsen = $barpks ;}

			  $bc =	$val->b_edc;		
              $tc = $val->t_edc;
              $baredc = ($edc/$tc)* $bc;
			  if($baredc>$bc){
					$csen = $bc * $persen;
				}else{ $csen = $baredc ;}

			  $bd = $val->bqris;
              $td = $val->qris;
              $barqris = ($qris/$td)* $bd;
			  if($barqris>$bd){
					$dsen = $bd * $persen;
				}else{ $dsen = $barqris ;}

			  $be = $val->b_bankgaransi;
              $te = $val->t_bankgaransi;
              $barbankgaransi = ($e/$te)* $be;
			  if($barbankgaransi>$be){
					$esen = $be * $persen;
				}else{ $esen = $barbankgaransi ;}

			  $bf = $val->b_giro;
              $tf = $val->t_giro;
              $bargiro = ($giro/$tf)* $bf;
			  if($bargiro>$bf){
					$fsen = $bf * $persen;
				}else{ $fsen = $bargiro ;}
              
              $bg = $val->b_tabungan;
			  $tg = $val->t_tabungan;
              $bartab = ($tab/$tg)* $bg;
			  if($bartab>$bg){
					$gsen = $bg * $persen;
				}else{ $gsen = $bartab ;}

              $bh = $val->b_premi;
			  $th = $val->t_pemi;
              $barpremi = ($h/$th)* $bh;
			  if($barpremi>$bh){
					$hsen = $bh * $persen;
				}else{ $hsen = $barpremi ;}

              $bi = $val->b_brimola;
			  $ti = $val->t_brimola;
              $barbrimola = ($brimola/$ti)* $bi;
			  if($barbrimola>$bi){
					$isen = $bi * $persen;
				}else{ $isen = $barbrimola ;}

              $bj = $val->b_digitalsav;
			  $tj = $val->t_digitalsav;
              $bardgsaving = ($dgsaving/$tj)* $bj;
			  if($bardgsaving>$bj){
					$jsen = $bj * $persen;
				}else{ $jsen = $bardgsaving ;}

      

					$total=number_format(($asen+$bsen+$csen+$dsen+$esen+$fsen+$gsen+$hsen+$isen+$jsen),1) ; 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta chartset="utf-8">
		<title>Speed Chart</title>
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
		<style type="text/css">
			.container {
	          width:75%;
	          height: 30%;
			  
      		}
		</style>
	    <script src="<?php echo base_url().'assets/js/Chart.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/Gauge.js'?>"></script>
	</head>
	<body>
	
		<div class="container">
		

			<div class="row" align="center">
				<canvas id="canvas" width="95" height="90"></canvas>
				
			</div>
			
		</div>
		
	</body>
</html>



<script type="text/javascript">
	var ctx = document.getElementById("canvas").getContext("2d");
	new Chart(ctx, {
		type: "tsgauge",
		data: {
			datasets: [{
				backgroundColor: ['#ff0000', 'orange','#ffff00', '#008000'],
				borderWidth: 0,
				gaugeData: {
					value: <?php echo number_format($total,1); ?>,
					valueColor: "#ff7143"
				},
				gaugeLimits: [0, 25, 50, 75, 100]
			}]
		},
		options: {
			events: [],
			showMarkers: true
		}
	});
</script>
<div></div>
<?php endforeach; ?>