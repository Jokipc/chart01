
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="en"	dir="ltr">
	<head>
	
	
		<meta charset="utf-8">
		<?php $this->load->view('templates/js'); ?>
		<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/style.css">
		<title>Rank</title>
		
	</head>
	<style>body {
  	background-image: url(template/dist/img/bag.jpg);
	  background-size: 120% 100%;
	
	}
	</style>
	<body>
	
	<!-- <meta http-equiv="refresh"  content="2; url=<?php echo base_url() ;?>rank/unit"/> -->
	<h4 style="color:#4169E1 ;background: rgb(19,200,42);
background: linear-gradient(90deg, rgba(19,200,42,1) 0%, rgba(95,242,218,1) 35%, rgba(188,235,245,1) 100%);"><marquee loop="1000" ><?php
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
			if ($number <= 5){
				print '<img src="'.base_url().'template/dist/img/a'.$number.'.png" id="balon'.$number.'" class="b b'.$number.'" alt="">';
				print '<p>';
				print '<div class="b b'.$number.'" style="color: purple;style="color: #FFF0F5;
				text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue"><br><br><center>'.$val->nama_mantri.'</center></br></br></div>';
				
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
	<div class="container-fluid">
	<div class="row" >
	<div class="col-md-1 "></div>
	<div class="col-md-5 ">

	<H3 class="animated infinite hinge"><b>PERINGKAT MANTRI 10 TERATAS</b></H3>
		<table class="table table-sm table-bordered" style="background-color:ivory; opacity:0.7">
		<tr style="width: 50px">
		<td class="td-number align-middle">No</td>
		<td></td>
		<td class="td-name">Nama</td>
		<td class="td-name">Unit</td>
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
								<td class="td-name">'.$val->unit.'</td>
								<td class="td-value">'.$val->scores.'</td>
								</tr>';		
					}
					else {}
				}	

			?>
		</table>
		
	
	</div>
	<div class="col-md-5">

	<H3 class="animated infinite hinge"><b>PERINGKAT 10 TERBAWAH MANTRI</b></H3>
		<table class="table table-sm table-bordered " style="background-color:ivory; opacity:0.7">
		<tr style="width: 50px">
		<td class="td-number align-middle">No</td>
		<td></td>
		<td class="td-name">Nama</td>
		<td class="td-name">Unit</td>
		<td class="td-value"> Nilai</td>


		</tr>
			<?php
			
				$num = 100;
				
				foreach( $end as $val1){
					$num++ ;
					if ($num < 111  ){
					print '<tr style="width: 50px">
								
								<td class="td-number align-middle">'.$num.'</td>
								<td class="td-image">
									<img
										src="'.base_url().'template/dist/img/kanca.png"
									/>
								</td>
								<td class="td-name">'.$val1->nama_mantri.'</td>
								<td class="td-name">'.$val1->unit.'</td>
								<td class="td-value">'.$val1->scores.'</td>
								</tr>';		
					}
					else {}
				}	

			?>
		</table>
		<div class="col-md-1 "></div>
		
	
	</div>
	</div>
	</div>
	</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $("table tr").hide();
	var balon = document.getElementById("balon3");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("table tr").each(function(index){
			$(this).delay(index*500).show(100);
		});
	})
	$("h3").hide();
	var balon = document.getElementById("balon3");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("h3").each(function(index){
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
      vertical-align: middle;
      text-align: middle;

	   
    }
    .td-number {
      width: 5%;
      background-color: #1c87af;
      color: black;
      text-align: center;
	  

    }

    .td-image {
      width: 5%;
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
      width: 40px;
      height: 40px;
      border-radius: 50%;
      /* object-fit: contain; */
    }
	h3{
	color: white;
	

	}
  </style>