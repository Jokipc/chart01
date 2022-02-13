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
        <h2 style="margin-top:0px">Mantri Read</h2>
        <table class="table">
	    <tr><td>Branch</td><td><?php echo $branch; ?></td></tr>
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Nama Mantri</td><td><?php echo $nama_mantri; ?></td></tr>
	    <tr><td>Id Level</td><td><?php echo $id_level; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Ico</td><td><?php echo $ico; ?></td></tr>
	    <tr><td>Target</td><td><?php echo $target; ?></td></tr>
	    <tr><td>Bsaving</td><td><?php echo $bsaving; ?></td></tr>
	    <tr><td>Bbrimo</td><td><?php echo $bbrimo; ?></td></tr>
	    <tr><td>Bqris</td><td><?php echo $bqris; ?></td></tr>
	    <tr><td>Bkunjual</td><td><?php echo $bkunjual; ?></td></tr>
	    <tr><td>Bstroberikasir</td><td><?php echo $bstroberikasir; ?></td></tr>
	    <tr><td>Saving</td><td><?php echo $saving; ?></td></tr>
	    <tr><td>Qris</td><td><?php echo $qris; ?></td></tr>
	    <tr><td>Brimo</td><td><?php echo $brimo; ?></td></tr>
	    <tr><td>Kunjual</td><td><?php echo $kunjual; ?></td></tr>
	    <tr><td>Pasar Id</td><td><?php echo $pasar_id; ?></td></tr>
	    <tr><td>Trx Pasarid</td><td><?php echo $trx_pasarid; ?></td></tr>
	    <tr><td>Stroberikasir</td><td><?php echo $stroberikasir; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bobotmantri') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>