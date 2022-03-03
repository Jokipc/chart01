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
			
              $persen = 110/100 ; 

			  $ba = $val->b_bankgaransi ;      
              $ta = $val->t_bankgaransi ;
              $bargaransi = ($a/$ta) * $ba; 
			  if($bargaransi>$ba){
					$asen = $ba * $persen ;
				}else{ $asen = $bargaransi ;}

			  $bb =	$val->b_bristore;
              $tb = $val->t_bristore;
              $barbristore= ($bristore/$tb)* $bb;
			  if($barbristore>$bb){
					$bsen = $bb * $persen;
				}else{ $bsen = $barbristore ;}

			  $bc =	$val->b_ibbiz;		
              $tc = $val->t_ibbiz;
              $baribbiz = ($ibbiz/$tc)* $bc;
			  if($baribbiz>$bc){
					$csen = $bc * $persen;
				}else{ $csen = $baribbiz ;}

			  $bd = $val->b_britama;
              $td = $val->t_britama;
              $barbritama = ($d_hsl/$td)* $bd;
			  if($barbritama>$bd){
					$dsen = $bd * $persen;
				}else{ $dsen = $barbritama ;}

			  $be = $val->b_premi;
              $te = $val->t_pemi;
              $barpremi = ($e/$te)* $be;
			  if($barpremi>$be){
					$esen = $be * $persen;
				}else{ $esen = $barpremi ;}

			  $bf = $val->b_penyalurankur;
              $tf = $val->t_penyalurankur;
              $barkur = ($f/$tf)* $bf;
			  if($barkur>$bf){
					$fsen = $bf * $persen;
				}else{ $fsen = $barkur ;}
              
              $bg = $val->bbrimo;
			  $tg = $val->brimo;
              $barbrimo = ($brimo/$tg)* $bg;
			  if($barbrimo>$bg){
					$gsen = $bg * $persen;
				}else{ $gsen = $barbrimo ;}

              $bh = $val->bqris;
			  $th = $val->qris;
              $barqris = ($qris/$th)* $bh;
			  if($barqris>$bh){
					$hsen = $bh * $persen;
				}else{ $hsen = $barqris ;}

              $bi = $val->b_realkecil;
			  $ti = $val->t_realkeci;
              $barkecil = ($i/$ti)* $bi;
			  if($barkecil>$bi){
					$isen = $bi * $persen;
				}else{ $isen = $barkecil ;}

              $bj = $val->b_ekstrakom;
			  $tj = $val->t_ekstrakom;
              $barekstrakom = ($j/$tj)* $bj;
			  if($barekstrakom>$bj){
					$jsen = $bj * $persen;
				}else{ $jsen = $barekstrakom ;}

      

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