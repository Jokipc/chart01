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
        <h2 style="margin-top:0px">Real <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" value="<?php echo $branch; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tgl Real <?php echo form_error('tgl_real') ?></label>
            <input type="text" class="form-control" name="tgl_real" id="tgl_real" placeholder="Tgl Real" value="<?php echo $tgl_real; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Plafon <?php echo form_error('plafon') ?></label>
            <input type="text" class="form-control" name="plafon" id="plafon" placeholder="Plafon" value="<?php echo $plafon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Code Desc <?php echo form_error('code_desc') ?></label>
            <input type="text" class="form-control" name="code_desc" id="code_desc" placeholder="Code Desc" value="<?php echo $code_desc; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('real') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>