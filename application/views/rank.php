<?php if($this->session->userdata('id_level')>='0'):?> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="en"	dir="ltr">
	<head>
		<!-- <meta http-equiv="refresh" content="100" > -->
		<meta charset="utf-8">
		
		<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/style.css">
		<!-- <link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/img/style1.css"> -->
		<title>Rank</title>
	</head>
	<body >
	<div class="show" >
	</div>
	<div class="body-mantri">
	<h4 style="color:purple ;background: rgb(19,200,42);
background: linear-gradient(90deg, rgba(19,200,42,1) 0%, rgba(95,242,218,1) 35%, rgba(188,235,245,1) 100%);"><marquee loop="1000" scrolldelay="70"><?php
				$num = 0;
				foreach( $data as $val){
					$num++;
					print '<tr>
								
								<td>'.$num.'.</td>
								<td>'.$val->nama_mantri.'&nbsp;</td>
								<td>'.$val->scores.'&nbsp;&nbsp;</td>
								<td>'.$val->unit.'&nbsp;&nbsp;</td>
								
								
							</tr>';
				}
			?>	
</marquee></h4>
	
	
	<?php
		// print_r($data);
		$number = 0;
		foreach( $data as $val){
			$number++;
			if ($number <= 3 ){
				print '<img src="'.base_url().'template/dist/img/a'.$number.'.png" id="balon'.$number.'" class="b b'.$number.'" alt="">';
				print '<p>';
				print '<div class="b b'.$number.'" style="color: purple;"><br><br><center>'.$val->nama_mantri.'</center></br></br></div>';
				
			}
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

	
	<div class="ground">
		<div class="t t1">
		<span></span>
		<span></span>
	</div>

	<center><div class="container-table">
	<H3 class="animated infinite hinge"><b>PERINGKAT MANTRI</b></H3>
		<table class="table table-sm table-bordered">
		<tr style="width: 50px">
		<td class="td-number align-middle">No</td>
		<td></td>
		<td class="td-name">Nama</td>
		<td class="td-value"> Nilai</td>
		
		</tr>
			<?php
				$num = 0;
				foreach( $data as $val){
					$num++ ;
					if ($num < 11 ){
					print '<tr style="width: 50px">
								
								<td class="td-number align-middle">'.$num.'</td>
								<td class="td-image">
									<img
										src="'.base_url().'template/dist/img/kanca.png"
									/>
								</td>
								<td class="td-name">'.$val->nama_mantri.'</td>
								<td class="td-value">'.$val->scores.'</td>
								
							</tr>';
					}
					else {}


				}
			?>
		</table>
	</div></center>
	</div>
	<div class="body-unit" >
		<?php $this->load->view('unit_live'); ?>
	</div>
	</body>

</html>
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>    

<?php endif;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $("table tr").hide();
	var balon = document.getElementById("balon3");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("table tr").each(function(index){
			$(this).delay(index*500).show(1000);
		});
	})
	$("h3").hide();
	let showMantri = true;
	$(".body-unit").hide();
	// $(".body-mantri").hide();
	setInterval(() => {
		console.log('setTimeout ');
		if (showMantri) {
			$(".show").replaceWith($(".body-unit"));
			$(".body-unit").show();
			$(".body-mantri").hide();
			showMantri = false;
			$("table tr").hide();
			var balon = document.getElementById("balon3");
			balon.addEventListener('webkitAnimationEnd', () => {
				console.log('anumation end');
				$("table tr").each(function(index){
					$(this).delay(index*500).show(1000);
				});
			})
		} else {
			$(".show").replaceWith($(".body-mantri"));
			$(".body-unit").hide();
			$(".body-mantri").show();
			showMantri = true;
			$("table tr").hide();
			var balon = document.getElementById("balon3");
			balon.addEventListener('webkitAnimationEnd', () => {
				console.log('anumation end');
				$("table tr").each(function(index){
					$(this).delay(index*500).show(1000);
				});
			})
		}
	}, 50000);
</script>

<style>
	.body-unit {
		width: 100%;
		height: 100%;
  	background-image: url(template/dist/img/ombak1.gif);
		margin: 0;
  	padding: 0;
		background-color: aqua;
		background-size: cover;
	}
	.body-mantri {
		width: 100%;
		height: 100%;
  	background-image: url(template/dist/img/bag.jpg);
		margin: 0;
  	padding: 0;
		background-color: aqua;
		background-size: cover;
	}
    .container-table {
      width: 40%;
      margin: 10px;
      border-radius: 5px;
	 

	  
    }
    .table > tbody > tr > td {
      vertical-align: middle;
      text-align: middle;

	   
    }
    .td-number {
      width: 5%;
      background-color: #1c87af;
      color: white;
      text-align: center;
	  

    }

    .td-image {
      width: 5%;
    }

    .td-name {
      width: 50%;
      background-color: #1c87af;
      color: white;
    }
    .td-value {
      width: 5%;
      background-color: #1c87af;
      color: white;
      text-align:center;
    }
    img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      /* object-fit: contain; */
    }
	h3{
	color: white;
	
	}
  </style>