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
		<table style="font-size:12 ; word-spacing: -2px;" width=100%  >Bobot :
			
			<td style="background-color:#007bff">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bmerchant'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:#17a2b8">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bsales'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:green">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bsaldo'); ?>%</td><td>&nbsp;&nbsp;</td>
		
		</table>	
	</body>
</html>

<?php
                    $merchanttarget = $this->session->userdata('merchant');
                    $bmerchant = $this->session->userdata('bmerchant');
					$merchantmax = ($bmerchant * 130 ) / 100 ;
					$merchanthasil= ($data_merchant/$merchanttarget)*$bmerchant ;
					if($merchanthasil > $merchantmax ){
						$merchantpersen = $merchantmax;
					}else{
						$merchantpersen = $merchanthasil; 
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
					$salesmax = ($bsales*130 )/100 ;
                    $saleshasil = ($data_sales/$salestarget)*$bsales ;
                    if($salesthasil > $salesmax ){
						$salespersen = $bsales;
					}else{
						$salespersen = $salesmax; 
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
					$saldomax = ($bsaldo * 130 ) / 100 ;
                    $saldohasil = ($data_saldo/$saldotarget)*$bsaldo ;
					if ($saldohasil > $saldomax){
						$saldopersen = $saldomax ; 
					}else{
						$saldopersen =$saldohasil ;
					}
                    

                   

					$total=number_format($merchantpersen+$salespersen+$saldopersen,1) ; 
?>
<?php $angka=10; ?>

<script type="text/javascript">
	var ctx = document.getElementById("canvas").getContext("2d");
	new Chart(ctx, {
		type: "tsgauge",
		data: {
			datasets: [{
				backgroundColor: ['#ff0000', '#ff0000','#008000', '#008000'],
				borderWidth: 0,
				gaugeData: {
					value: <?php echo number_format($total,1); ?>,
					valueColor: "#ff7143"
				},
				gaugeLimits: [0, 50, 100, 150, 200]
			}]
		},
		options: {
			events: [],
			showMarkers: true
		}
	});
</script>
