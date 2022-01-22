<?php if($this->session->userdata('id_level')==='1'):?> 


<html lang="en"	dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/style.css">
		<title>Air Balons</title>
	</head>
	
	
	
	<body>
	
	<br></br>
	<h3 style= "color : blue"><center>PERANGKAT MANTRI</center></h3>
	<?php
		$number = 0;
		foreach( $data as $val){
		$number++;
			print '<img src="'.base_url().'template/dist/img/a.png" class="b b'.$number.'" alt="">';
			
			
			

			print '<div class="b b'.$number.'" style="color: blue;"><br><br><center>'.$val->nama_mantri.'</center></br></br></div>';
			
		}
	?>
	
	
	<div class="c c1">
		<div class="cloud">
		</div>
	</div>
	<div class="c c2">
		<div class="cloud">
		</div>
	</div>
	<div class="c c3">
		<div class="cloud">
		</div>
	</div>
	<div class="c c4">
		<div class="cloud">
		</div>
	</div>
	<div class="c c5">
		<div class="cloud">
		</div>
	</div>
	<div class="c c6">
		<div class="cloud">
		</div>
	</div>
	
	<div class="ground">
		<div class+"t t1">
		<span></span>
		<span></span>
	</div>
	
	 
	</body>
	
	
</html>
<?php else: ?>
<?= "Bukan Hak Akses Anda !!" ?>
<?php endif;?>