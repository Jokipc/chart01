
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
	
		

	</body>
</html>

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
			
              $persen = 110/100 ; 

			  $ba = $val->b_briguna ;      
              $ta = $val->t_briguna ;
              $barbriguna = ($a/$ta) * $ba; 
			  if($barbriguna>$ba){
					$asen = $ba * $persen ;
				}else{ $asen = $barbriguna ;}

			  $bb =	$val->b_debbriguna;
              $tb = $val->t_debbriguna;
              $bardeb= ($deb/$tb)* $bb;
			  if($bardeb>$bb){
					$bsen = $bb * $persen;
				}else{ $bsen = $bardeb ;}

			  $bc =	$val->b_kk;		
              $tc = $val->t_kk;
              $barkk = ($kk/$tc)* $bc;
			  if($barkk>$bc){
					$csen = $bc * $persen;
				}else{ $csen = $barkk ;}

			  $bd = $val->bbrimo;
              $td = $val->brimo;
              $barbrimo = ($brimo/$td)* $bd;
			  if($barbrimo>$bd){
					$dsen = $bd * $persen;
				}else{ $dsen = $barbrimo ;}

			  $be = $val->b_digitalsav;
              $te = $val->t_digitalsav;
              $bardgsaving = ($dgsaving/$te)* $be;
			  if($bardgsaving>$be){
					$esen = $be * $persen;
				}else{ $esen = $bardgsaving ;}

			  $bf = $val->b_premi;
              $tf = $val->t_pemi;
              $barpremi = ($f/$tf)* $bf;
			  if($barpremi>$bf){
					$fsen = $bf * $persen;
				}else{ $fsen = $barpremi ;}
              
              $bg = $val->b_ekstrakom;
			  $tg = $val->t_ekstrakom;
              $barekstrakom = ($g/$tg)* $bg;
			  if($barekstrakom>$bg){
					$gsen = $bg * $persen;
				}else{ $gsen = $barekstrakom ;}


					$total=number_format(($asen+$bsen+$csen+$dsen+$esen+$fsen+$gsen),1) ; 
?>
<?php endforeach; ?>



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
