
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="en"	dir="ltr">
	<head>
	
	
		<meta charset="utf-8">
		<?php $this->load->view('templates/js'); ?>
		<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/style.css">
		<title>Rank</title>
		
	</head>
	<style>body {
  	background-image: url(../template/dist/img/bag.gif);
	margin: 0;
  	padding: 0;
	background-color: aqua;
	background-size: cover;
	}
	</style>
	<body>
	
	<!-- <meta http-equiv="refresh"  content="2; url=<?php echo base_url() ;?>rank/unit"/> -->
	<h4 style="color:#4169E1 ;background: rgb(19,200,42);
background: linear-gradient(90deg, rgba(19,200,42,1) 0%, rgba(95,242,218,1) 35%, rgba(188,235,245,1) 100%);"><marquee loop="1000" ><?php
				$num = 0;
				foreach( $data as $val){
					$num++;
					$a = $val->real_a;	
					if($a>110){$a1 = 110;}else{ $a1 = $a;}
					$b = $val->real_b;	
					if($b>110){$b1 = 110;}else{ $b1 = $b;}
					$c = $val->real_c;	
					if($c>110){$c1 = 110;}else{ $c1 = $c;}
					$d = $val->real_d;	
					if($d>110){$d1 = 110;}else{ $d1 = $d;}
					$e = $val->real_e;	
					if($e>110){$e1 = 110;}else{ $e1 = $e;}
					$f = $val->real_f;	
					if($f>110){$f1 = 110;}else{ $f1 = $f;}
					$g = $val->real_g;	
					if($g>110){$g1 = 110;}else{ $g1 = $g;}
					$h = $val->real_h;	
					if($h>110){$h1 = 110;}else{ $h1 = $h;}
					$i = $val->real_i;	
					if($i>110){$i1 = 110;}else{ $i1 = $i;}
					$j = $val->real_j;	
					if($j>110){$j1 = 110;}else{ $j1 = $j;}
			 
					$total =($a1+$b1+$c1+$d1+$e1+$f1+$g1+$h1+$i1+$j1)/10;
					print '<tr>
								
								<td>'.$num.'.</td>
								<td>'.$val->nama_mantri.'&nbsp;</td>
								<td>'.number_format($val->scores,2).'&nbsp;&nbsp;</td>
								
								
								
							</tr>';
				}
			?>	
</marquee></h4>
	
	
	<?php
		// print_r($data);
		$number = 0;
		foreach( $data as $val){
			$number++;
			if ($number <= 5){
				print '<img src="'.base_url().'template/dist/img/a'.$number.'.gif" id="balon'.$number.'" class="b b'.$number.'" alt="">';
				print '<p>';
				print '<div class="b b'.$number.'" style="color: #FFF0F5;
				text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue; font-size:16px;"><br><br><center>'.$val->nama_mantri.'</center></br></br></div>';
				
			}
		}
	?>
	
	<!-- <div class="c c1">
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
	</div> -->

	
	<div class="ground">
		<div class="t t1">
		<span></span>
		<span></span>
	</div>
	<div class="container-fluid">
	<div class="row" >
	<div class="col-sm-1 "></div>
	<div class="col-sm-10 ">

	<h5 class="animated infinite hinge"><center>PERINGKAT RM SME</center></h5>
		<table class="table table-sm table-striped table-info table-responsive" style="background-color:ivory; opacity:0.8">
		<tr style="width: 50px">
		<td class="td-number align-middle"><center><b>No</b></center></td>
		<td></td>
		<td class="td-name"><center><b>Nama</b></center></td>
		<td class="td-value"><center><b>Bank Garansi</b></center></td>
		<td class="td-value"><center><b>Bristore</b></center></td>
		<td class="td-value"><center><b>Ibbiz</b></center></td>
		<td class="td-value"><center><b>Britama Bisnis</b></center></td>
		<td class="td-value"><center><b>Pijar / Davestera</b></center></td>
		<td class="td-value"><center><b>Penyaluran Kur</b></center></td>
		<td class="td-value"><center><b>BRIMO</b></center></td>
		<td class="td-value"><center><b>QRIS</b></center></td>
		<td class="td-value"><center><b>Real Kecil</b></center></td>
		<td class="td-value"><center><b>Ekstrakom</b></center></td>
		<td class="td-value"><center><b>Nilai</b></center></td>


		</tr>
			<?php
			
				$num = 0;
				$a = 0;
				foreach( $data as $val){
					$num++ ;
					
					$a = $val->real_a;	
					if($a>110){$a1 = 110;}else{ $a1 = $a;}
					$b = $val->real_b;	
					if($b>110){$b1 = 110;}else{ $b1 = $b;}
					$c = $val->real_c;	
					if($c>110){$c1 = 110;}else{ $c1 = $c;}
					$d = $val->real_d;	
					if($d>110){$d1 = 110;}else{ $d1 = $d;}
					$e = $val->real_e;	
					if($e>110){$e1 = 110;}else{ $e1 = $e;}
					$f = $val->real_f;	
					if($f>110){$f1 = 110;}else{ $f1 = $f;}
					$g = $val->real_g;	
					if($g>110){$g1 = 110;}else{ $g1 = $g;}
					$h = $val->real_h;	
					if($h>110){$h1 = 110;}else{ $h1 = $h;}
					$i = $val->real_i;	
					if($i>110){$i1 = 110;}else{ $i1 = $i;}
					$j = $val->real_j;	
					if($j>110){$j1 = 110;}else{ $j1 = $j;}
			 
					$total =($a1+$b1+$c1+$d1+$e1+$f1+$g1+$h1+$i1+$j1)/10;
					
					if ($num < 18 ){
					print '<tr style="width: 50px">
								
								<td class="td-number align-middle ">'.$num.'</td>
								<td class="td-image">
									<img
										src="'.base_url().'template/dist/img/kanca.png"
									/>
								</td>
								<td class="td-name">'.$val->nama_mantri.'</td>
								
								<td class="td-value">'.number_format($a1,0).'%</td>
								<td class="td-value">'.number_format($b1,0).'%</td>
								<td class="td-value">'.number_format($c1,0).'%</td>
								<td class="td-value">'.number_format($d1,0).'%</td>
								<td class="td-value">'.number_format($e1,0).'%</td>
								<td class="td-value">'.number_format($f1,0).'%</td>
								<td class="td-value">'.number_format($g1,0).'%</td>
								<td class="td-value">'.number_format($h1,0).'%</td>
								<td class="td-value">'.number_format($i1,0).'%</td>
								<td class="td-value">'.number_format($j1,0).'%</td>
								<td class="td-value"><b>'.number_format($val->scores,2).'</b></td>
								</tr>';		
					}
					else {}
				}	

			?>
		</table>
		
	
	</div>
	
	</div>
	</div>
	</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $("table tr").hide();
	var balon = document.getElementById("balon1");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("table tr").each(function(index){
			$(this).delay(index*500).show(100);
		});
	})
	$("h5").hide();
	var balon = document.getElementById("balon1");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("h5").each(function(index){
			$(this).delay(index*500).show(100);
		});
	})
</script>

<style>
    .container-table {
      width: 40%;
      margin: 10px;
      border-radius: 5px;
	 

	  
    }
    .table > tbody > tr > td {
		padding: 0px 3px;
		font-size: 15px
	   
    }
    .td-number {
      width: 1%;
      background-color: #1c87af;
      color: black;
      text-align: center;
	  

    }

    .td-image {
      width: 2%;
    }

    .td-name {
      width: 50%;
      background-color: #1c87af;
      color: black;
    }
    .td-value {
      width: 5%;
      background-color: #1c87af;
      color: black;
      text-align:center;
    }
    img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      /* object-fit: contain; */
    }
	h5{
	color: blue;
	

	}
  </style>