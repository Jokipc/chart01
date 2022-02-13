<div>
	<h4 style="color:blue ;background: rgb(223,97,39);
background: linear-gradient(90deg, rgba(223,97,39,1) 0%, rgba(242,193,95,1) 35%, rgba(175,241,255,1) 100%);"><marquee loop="1000" scrolldelay="150"><?php
				$num = 0;
				foreach( $data_unit as $val){
					$num++;
					print '<tr>
								
								<td>'.$num.'.</td>
								<td>'.$val->unit.'</td>
								<td>'.$val->scores.'&nbsp; % &nbsp;&nbsp;&nbsp;&nbsp;</td>
								
								
								
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
				print '<img src="'.base_url().'template/dist/img/k'.$number.'.png" id="balon'.$number.'" class="b b'.$number.'" alt="">';
				
				print '<div class="b b'.$number.'" style="color: orange;"><br><br><center>'.$val->unit.'</center></br></br></div>';
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

	<center>
	<div class="container-table">
		<H3 class="animated infinite hinge"><b>Total Pencapaian</b></H3>
		<table class="table table-sm table-bordered">
		
			<?php
				$num = 0;
				foreach( $data_unit as $val){
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
	</div>
</center>
</div>
