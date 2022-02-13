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
        <h2 style="margin-top:0px">Action <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Action <?php echo form_error('tgl_action') ?></label>
            <input type="text" class="form-control" name="tgl_action" id="tgl_action" placeholder="Tgl Action" value="<?php echo $tgl_action; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kunjual <?php echo form_error('kunjual') ?></label>
            <input type="text" class="form-control" name="kunjual" id="kunjual" placeholder="Kunjual" value="<?php echo $kunjual; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Trgt Kunjual <?php echo form_error('trgt_kunjual') ?></label>
            <input type="text" class="form-control" name="trgt_kunjual" id="trgt_kunjual" placeholder="Trgt Kunjual" value="<?php echo $trgt_kunjual; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lupus <?php echo form_error('lupus') ?></label>
            <input type="text" class="form-control" name="lupus" id="lupus" placeholder="Lupus" value="<?php echo $lupus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Trgt Lupus <?php echo form_error('trgt_lupus') ?></label>
            <input type="text" class="form-control" name="trgt_lupus" id="trgt_lupus" placeholder="Trgt Lupus" value="<?php echo $trgt_lupus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tagih <?php echo form_error('tagih') ?></label>
            <input type="text" class="form-control" name="tagih" id="tagih" placeholder="Tagih" value="<?php echo $tagih; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Trgt Penagihan <?php echo form_error('trgt_penagihan') ?></label>
            <input type="text" class="form-control" name="trgt_penagihan" id="trgt_penagihan" placeholder="Trgt Penagihan" value="<?php echo $trgt_penagihan; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('action') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>