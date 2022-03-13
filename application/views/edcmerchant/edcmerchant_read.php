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
        <h2 style="margin-top:0px">Edcmerchant Read</h2>
        <table class="table">
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Id Merchant</td><td><?php echo $id_merchant; ?></td></tr>
	    <tr><td>Nama Merchant</td><td><?php echo $nama_merchant; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('edcmerchant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>