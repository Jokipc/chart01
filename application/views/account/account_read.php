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
        <h2 style="margin-top:0px">Account Read</h2>
        <table class="table">
	    <tr><td>Branch</td><td><?php echo $branch; ?></td></tr>
	    <tr><td>Unit</td><td><?php echo $unit; ?></td></tr>
	    <tr><td>Purchase</td><td><?php echo $purchase; ?></td></tr>
	    <tr><td>Sale</td><td><?php echo $sale; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('account') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>