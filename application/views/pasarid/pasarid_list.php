<!doctype html>
<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
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
    <body class="sidebar-mini layout-fixed; " >
     <div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
        <h2 style="margin-top:0px">Pasarid List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pasarid/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pasarid/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pasarid'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="width:800px"">
            <tr>
                <th>No</th>
		<th>Pn</th>
		<th>Tgl</th>
		<th>Nama Toko</th>
		<th>Nama Toko</th>
		<th>Nama Toko</th>
		<th>Action</th>
            </tr><?php
            foreach ($pasarid_data as $pasarid)
            {
                ?>
                <tr>
			<td ><?php echo ++$start ?></td>
			<td><?php echo $pasarid->pn ?></td>
			<td><?php echo $pasarid->tgl ?></td>
			<td ><?php echo $pasarid->nama_toko ?></td>
			<td><?php echo $pasarid->nama_toko ?></td>
			<td><?php echo $pasarid->nama_toko ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pasarid/read/'.$pasarid->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pasarid/update/'.$pasarid->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pasarid/delete/'.$pasarid->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('pasarid/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </body>
</html>
<?php $this->load->view('templates/footer'); ?>
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>