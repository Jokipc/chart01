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

<?php
                    $savingtarget = $this->session->userdata('saving');
                    $savingpersen = ($data_saving/$savingtarget) * 100 ;

                    $brimotarget = $this->session->userdata('brimo');
                    $brimopersen = ($data_brimo/$brimotarget) * 100 ;

                    $qristarget = $this->session->userdata('qris');
                    $qrispersen = ($data_qris/$qristarget) * 100 ;

                    $kunjualtarget = $this->session->userdata('kunjual');
                    $kunjualpersen = ($data_kunjual/$kunjualtarget) * 100 ;

                    $stroberitarget = $this->session->userdata('stroberikasri');
                    $stroberipersen = ($data_stroberi/$stroberitarget) * 100 ;
                  
                    $pasartarget = $this->session->userdata('pasar');
                    $pasarpersen = ($data_pasar/$pasartarget) * 100 ;

					$total=number_format($savingpersen+$brimopersen+$qrispersen+$kunjualpersen+$stroberipersen)/5 ; 
?>
<?php $angka=10; ?>

<script type="text/javascript">
	var ctx = document.getElementById("canvas").getContext("2d");
	new Chart(ctx, {
		type: "tsgauge",
		data: {
			datasets: [{
				backgroundColor: ['#ff0000', 'orange','#ffff00', '#008000'],
				borderWidth: 0,
				gaugeData: {
					value: <?php echo $total; ?>,
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