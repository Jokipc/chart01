<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Ritel List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('ritel/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ritel/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ritel'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id</th>
		<th>Branch</th>
		<th>Pn</th>
		<th>Nama Rm</th>
		<th>Koderm</th>
		<th>Rm Segemen</th>
		<th>T Ibbiz</th>
		<th>B Ibbiz</th>
		<th>T Bristore</th>
		<th>B Bristore</th>
		<th>T Bankgaransi</th>
		<th>B Bankgaransi</th>
		<th>T Penyalurankur</th>
		<th>B Penyalurankur</th>
		<th>T Realkeci</th>
		<th>B Realkecil</th>
		<th>T Pemi</th>
		<th>B Premi</th>
		<th>T Ekstrakom</th>
		<th>B Ekstrakom</th>
		<th>T Britama</th>
		<th>B Britama</th>
		<th>T Payrol</th>
		<th>B Payrol</th>
		<th>T Edc</th>
		<th>B Edc</th>
		<th>T Giro</th>
		<th>B Giro</th>
		<th>T Tabungan</th>
		<th>B Tabungan</th>
		<th>T Brimola</th>
		<th>B Brimola</th>
		<th>T Digitalsav</th>
		<th>B Digitalsav</th>
		<th>T Kpr</th>
		<th>B Kpr</th>
		<th>T Debkpr</th>
		<th>B Debkpr</th>
		<th>T Kk</th>
		<th>B Kk</th>
		<th>T Briguna</th>
		<th>B Briguna</th>
		<th>T Debbriguna</th>
		<th>B Debbriguna</th>
		<th>Action</th>
            </tr><?php
            foreach ($ritel_data as $ritel)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $ritel->id ?></td>
			<td><?php echo $ritel->branch ?></td>
			<td><?php echo $ritel->pn ?></td>
			<td><?php echo $ritel->nama_rm ?></td>
			<td><?php echo $ritel->koderm ?></td>
			<td><?php echo $ritel->rm_segemen ?></td>
			<td><?php echo $ritel->t_ibbiz ?></td>
			<td><?php echo $ritel->b_ibbiz ?></td>
			<td><?php echo $ritel->t_bristore ?></td>
			<td><?php echo $ritel->b_bristore ?></td>
			<td><?php echo $ritel->t_bankgaransi ?></td>
			<td><?php echo $ritel->b_bankgaransi ?></td>
			<td><?php echo $ritel->t_penyalurankur ?></td>
			<td><?php echo $ritel->b_penyalurankur ?></td>
			<td><?php echo $ritel->t_realkeci ?></td>
			<td><?php echo $ritel->b_realkecil ?></td>
			<td><?php echo $ritel->t_pemi ?></td>
			<td><?php echo $ritel->b_premi ?></td>
			<td><?php echo $ritel->t_ekstrakom ?></td>
			<td><?php echo $ritel->b_ekstrakom ?></td>
			<td><?php echo $ritel->t_britama ?></td>
			<td><?php echo $ritel->b_britama ?></td>
			<td><?php echo $ritel->t_payrol ?></td>
			<td><?php echo $ritel->b_payrol ?></td>
			<td><?php echo $ritel->t_edc ?></td>
			<td><?php echo $ritel->b_edc ?></td>
			<td><?php echo $ritel->t_giro ?></td>
			<td><?php echo $ritel->b_giro ?></td>
			<td><?php echo $ritel->t_tabungan ?></td>
			<td><?php echo $ritel->b_tabungan ?></td>
			<td><?php echo $ritel->t_brimola ?></td>
			<td><?php echo $ritel->b_brimola ?></td>
			<td><?php echo $ritel->t_digitalsav ?></td>
			<td><?php echo $ritel->b_digitalsav ?></td>
			<td><?php echo $ritel->t_kpr ?></td>
			<td><?php echo $ritel->b_kpr ?></td>
			<td><?php echo $ritel->t_debkpr ?></td>
			<td><?php echo $ritel->b_debkpr ?></td>
			<td><?php echo $ritel->t_kk ?></td>
			<td><?php echo $ritel->b_kk ?></td>
			<td><?php echo $ritel->t_briguna ?></td>
			<td><?php echo $ritel->b_briguna ?></td>
			<td><?php echo $ritel->t_debbriguna ?></td>
			<td><?php echo $ritel->b_debbriguna ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ritel/read/'.$ritel->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('ritel/update/'.$ritel->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('ritel/delete/'.$ritel->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('ritel/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>