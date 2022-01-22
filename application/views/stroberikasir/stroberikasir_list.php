<!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>

    <body>
     <div class="content-wrapper" style="min-height: 955.807px;">
        <h2 style="margin-top:0px">Stroberikasir List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('stroberikasir/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stroberikasir/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stroberikasir'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Toko</th>
		<th>Hp</th>
		<th>Action</th>
            </tr><?php
            foreach ($stroberikasir_data as $stroberikasir)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stroberikasir->pn ?></td>
			<td><?php echo $stroberikasir->tgl ?></td>
			<td><?php echo $stroberikasir->nama_toko ?></td>
			<td><?php echo $stroberikasir->hp ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stroberikasir/read/'.$stroberikasir->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('stroberikasir/update/'.$stroberikasir->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('stroberikasir/delete/'.$stroberikasir->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('stroberikasir/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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