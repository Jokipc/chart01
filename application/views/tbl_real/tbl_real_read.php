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
        <h2 style="margin-top:0px">Tbl_real Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Branch</td><td><?php echo $branch; ?></td></tr>
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Tgl Real</td><td><?php echo $tgl_real; ?></td></tr>
	    <tr><td>Plafon</td><td><?php echo $plafon; ?></td></tr>
	    <tr><td>Code Des</td><td><?php echo $code_des; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbl_real') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>