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
        <h2 style="margin-top:0px">Action Read</h2>
        <table class="table">
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Tgl Action</td><td><?php echo $tgl_action; ?></td></tr>
	    <tr><td>Kunjual</td><td><?php echo $kunjual; ?></td></tr>
	    <tr><td>Trgt Kunjual</td><td><?php echo $trgt_kunjual; ?></td></tr>
	    <tr><td>Lupus</td><td><?php echo $lupus; ?></td></tr>
	    <tr><td>Trgt Lupus</td><td><?php echo $trgt_lupus; ?></td></tr>
	    <tr><td>Tagih</td><td><?php echo $tagih; ?></td></tr>
	    <tr><td>Trgt Penagihan</td><td><?php echo $trgt_penagihan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('action') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>