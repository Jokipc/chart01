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
        <h2 style="margin-top:0px">Tbl_real <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id <?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?php echo $id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" value="<?php echo $branch; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Real <?php echo form_error('tgl_real') ?></label>
            <input type="text" class="form-control" name="tgl_real" id="tgl_real" placeholder="Tgl Real" value="<?php echo $tgl_real; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Plafon <?php echo form_error('plafon') ?></label>
            <input type="text" class="form-control" name="plafon" id="plafon" placeholder="Plafon" value="<?php echo $plafon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Code Des <?php echo form_error('code_des') ?></label>
            <input type="text" class="form-control" name="code_des" id="code_des" placeholder="Code Des" value="<?php echo $code_des; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_real') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>