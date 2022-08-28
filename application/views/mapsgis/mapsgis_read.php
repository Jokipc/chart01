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
        <h2 style="margin-top:0px">Mapsgis Read</h2>
        <table class="table">
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Latitude</td><td><?php echo $latitude; ?></td></tr>
	    <tr><td>Longitude</td><td><?php echo $longitude; ?></td></tr>
	    <tr><td>Rek</td><td><?php echo $rek; ?></td></tr>
	    <tr><td>Brimo</td><td><?php echo $brimo; ?></td></tr>
	    <tr><td>Qris</td><td><?php echo $qris; ?></td></tr>
	    <tr><td>Edc</td><td><?php echo $edc; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mapsgis') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>