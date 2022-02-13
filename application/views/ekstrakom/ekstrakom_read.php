<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
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
    <div class="content-wrapper" style="min-height: 555.807px;border:0px;  overflow:auto; float:left; width:100%">
        <h2 style="margin-top:0px">Ekstrakom Read</h2>
        <table class="table">
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Norek</td><td><?php echo $norek; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Plafond</td><td><?php echo $plafond; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ekstrakom') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table></div>
        </body>
</html>
<?php else: ?>
<br>
<br>
<center>   
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>