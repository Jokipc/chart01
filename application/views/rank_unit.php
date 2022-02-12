
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="en"	dir="ltr">
	<head>
	<!-- <meta http-equiv="refresh"  content="10; url=<?php echo base_url() ;?>rank"/> -->
		<meta charset="utf-8">
		
		<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/img/style1.css">
		<title>Rank Unit</title>
	</head>
	<style>body {
  	background-image: url(../template/dist/img/ombak1.gif);
	margin: 0;
  	padding: 0;
	background-color: aqua;
	background-size: cover;
	}
	</style>
	<body>
		
	<h2 style="color:#4169E1; background: rgb(223,97,39);
background: linear-gradient(90deg, rgba(223,97,39,1) 0%, rgba(242,193,95,1) 35%, rgba(175,241,255,1) 100%);"><marquee loop="1000" ><?php
				$num = 0;
				foreach( $data as $val){
					$num++;
					print '<tr>
								
								<td>'.$num.'.</td>
								<td>'.$val->unit.'</td>
								<td>'.$val->scores.'&nbsp; % &nbsp;&nbsp;&nbsp;&nbsp;</td>
								
								
								
							</tr>';
				}
			?>	
</marquee></h2>
	
	
	<?php
		// print_r($data);
		$number = 0;
		foreach( $data as $val){
			$number++;
			if ($number <= 3 ){
				print '<img src="'.base_url().'template/dist/img/k'.$number.'.png" id="balon'.$number.'" class="b b'.$number.'" alt="">';
				
				print '<div class="b b'.$number.'" style="color: #FFF0F5;
				text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue; font-size:30px;"><br><br><center>'.$val->unit.'</center></br></br></div>';
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

	
	
	<div class="ground">
		<div class="t t1">
		<span></span>
		<span></span>
	</div>

	<center><div class="container-table">
	<H3 class="animated infinite hinge"><b>Total Pencapaian</b></H3>
		<table class="table table-sm table-bordered">
		
			<?php
				$num = 0;
				foreach( $data as $val){
					$num++;
					print '<tr style="width: 50px">
								
								<td class="td-number align-middle">'.$num.'</td>
								<td class="td-image">
									<img
										src="'.base_url().'template/dist/img/kanca.png"
									/>
								</td>
								<td class="td-name">'.$val->unit.'</td>
								<td class="td-value">'.$val->scores.'</td>
								
							</tr>';
				}
			?>
		</table>
	</div></center>
	</body>

</html>

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
	var balon = document.getElementById("balon3");
	balon.addEventListener('webkitAnimationEnd', () => {
		console.log('anumation end');
		$("h3").each(function(index){
			$(this).delay(index*500).show(1000);
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
	  color:blue;

	   
    }
    .td-number {
      width: 5%;
      background-color: rgb(250, 199, 133);
      color:blue;
      text-align: center;
	  

    }

    .td-image {
      width: 5%;
    }

    .td-name {
      width: 50%;
      background-color: rgb(250, 199, 133);
	  color:blue;
	  
      color: white;
    }
    .td-value {
      width: 5%;
      background-color: rgb(250, 199, 133);
      color:blue;
      text-align:center;
    }
    img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      /* object-fit: contain; */
    }
	h4{
	color: rgb(250, 199, 133);
	
	}
  </style>