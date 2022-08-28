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
        <h2 style="margin-top:0px">Mapsgis List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mapsgis/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mapsgis/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mapsgis'); ?>" class="btn btn-default">Reset</a>
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
		<th>Pn</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Hp</th>
		<th>Email</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Rek</th>
		<th>Brimo</th>
		<th>Qris</th>
		<th>Edc</th>
		<th>Action</th>
            </tr><?php
            foreach ($mapsgis_data as $mapsgis)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mapsgis->pn ?></td>
			<td><?php echo $mapsgis->nama ?></td>
			<td><?php echo $mapsgis->alamat ?></td>
			<td><?php echo $mapsgis->hp ?></td>
			<td><?php echo $mapsgis->email ?></td>
			<td><?php echo $mapsgis->latitude ?></td>
			<td><?php echo $mapsgis->longitude ?></td>
			<td><?php echo $mapsgis->rek ?></td>
			<td><?php echo $mapsgis->brimo ?></td>
			<td><?php echo $mapsgis->qris ?></td>
			<td><?php echo $mapsgis->edc ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mapsgis/read/'.$mapsgis->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('mapsgis/update/'.$mapsgis->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('mapsgis/delete/'.$mapsgis->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('mapsgis/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>