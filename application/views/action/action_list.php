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
        <h2 style="margin-top:0px">Action List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('action/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('action/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('action'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tgl Action</th>
		<th>Kunjual</th>
		<th>Trgt Kunjual</th>
		<th>Lupus</th>
		<th>Trgt Lupus</th>
		<th>Tagih</th>
		<th>Trgt Penagihan</th>
		<th>Action</th>
            </tr><?php
            foreach ($action_data as $action)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $action->pn ?></td>
			<td><?php echo $action->tgl_action ?></td>
			<td><?php echo $action->kunjual ?></td>
			<td><?php echo $action->trgt_kunjual ?></td>
			<td><?php echo $action->lupus ?></td>
			<td><?php echo $action->trgt_lupus ?></td>
			<td><?php echo $action->tagih ?></td>
			<td><?php echo $action->trgt_penagihan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('action/read/'.$action->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('action/update/'.$action->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('action/delete/'.$action->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('action/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>