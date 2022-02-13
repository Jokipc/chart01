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
        <h2 style="margin-top:0px">Account <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" value="<?php echo $branch; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Unit <?php echo form_error('unit') ?></label>
            <input type="text" class="form-control" name="unit" id="unit" placeholder="Unit" value="<?php echo $unit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Purchase <?php echo form_error('purchase') ?></label>
            <input type="text" class="form-control" name="purchase" id="purchase" placeholder="Purchase" value="<?php echo $purchase; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sale <?php echo form_error('sale') ?></label>
            <input type="text" class="form-control" name="sale" id="sale" placeholder="Sale" value="<?php echo $sale; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('account') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>