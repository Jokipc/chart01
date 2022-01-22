<!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php if($this->session->userdata('id_level')==='1'):?> 
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php else: ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php endif;?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>
     <body>
     <div class="content-wrapper" style="min-height: 955.807px;">
     <br>
     
     <ul>   
     <h2 style="margin-top:0px">Brimo List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('brimo/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('brimo/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('brimo'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tgl</th>
		<th>Norek</th>
		<th>Action</th>
            </tr><?php
            foreach ($brimo_data as $brimo)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $brimo->pn ?></td>
			<td><?php echo $brimo->tgl ?></td>
			<td><?php echo $brimo->norek ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('brimo/read/'.$brimo->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('brimo/update/'.$brimo->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('brimo/delete/'.$brimo->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('brimo/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </section>
        </body>
        </div>
</html>
<?php $this->load->view('templates/footer'); ?>