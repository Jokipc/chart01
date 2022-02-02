<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>

    <body>
     <div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
     <ul>
        <h2 style="margin-top:0px">Qris List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('qris/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('qris'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Qris</th>
		<th>Hp</th>
		<th>Action</th>
            </tr><?php
            foreach ($qris_data as $qris)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $qris->pn ?></td>
			<td><?php echo $qris->tgl ?></td>
			<td><?php echo $qris->norek ?></td>
			<td><?php echo $qris->nama_qris ?></td>
			<td><?php echo $qris->hp ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				
				echo anchor(site_url('qris/delete/'.$qris->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('qris/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>