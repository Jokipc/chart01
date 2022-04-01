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
			
			<td style="background-color:#007bff">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bsaving'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:#17a2b8">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bbrimo'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:#28a745">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bqris'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:#ffc107">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bkunjual'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:#dc3545">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bstroberikasir'); ?>%</td><td>&nbsp;&nbsp;</td>
			<td style="background-color:yellow">&nbsp;&nbsp;&nbsp;</td><td>&nbsp;:&nbsp;<?php echo $this->session->userdata('bumi'); ?>%</td><td>&nbsp;&nbsp;</td>
		
		</table>	
	</body>
</html>

<?php
                    $savingtarget = $this->session->userdata('saving');
                    $bsaving = $this->session->userdata('bsaving');
                    $savingpersen = ($data_saving/$savingtarget)*$bsaving ;
                   

                    $brimotarget = $this->session->userdata('brimo');
                    $bbrimo = $this->session->userdata('bbrimo');
                    $brimopersen = ($data_brimo/$brimotarget)*$bbrimo ;
                    

                    $qristarget = $this->session->userdata('qris');
                    $bqris = $this->session->userdata('bqris');
                    $qrispersen = ($data_qris/$qristarget)*$bqris ;
                    
                    $kunjualtarget = $this->session->userdata('kunjual');
                    $bkunjual = $this->session->userdata('bkunjual');
                    $kunjualpersen = ($data_kunjual/$kunjualtarget)*$bkunjual;
                

                    $stroberitarget = $this->session->userdata('stroberikasir');
                    $bstroberikasir = $this->session->userdata('bstroberikasir');
                    $stroberipersen = ($data_stroberikasir/$stroberitarget)*$bstroberikasir;

					$umitarget = $this->session->userdata('umi');
                    $bumi = $this->session->userdata('bumi');
                    $umipersen = ($umi/$umitarget)*$bumi;
                   
                   

					$total=number_format($savingpersen+$brimopersen+$qrispersen+$kunjualpersen+$stroberipersen+$umipersen,1) ; 
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