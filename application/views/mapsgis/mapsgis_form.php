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
        <h2 style="margin-top:0px">Mapsgis <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Latitude <?php echo form_error('latitude') ?></label>
            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rek <?php echo form_error('rek') ?></label>
            <input type="text" class="form-control" name="rek" id="rek" placeholder="Rek" value="<?php echo $rek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Brimo <?php echo form_error('brimo') ?></label>
            <input type="text" class="form-control" name="brimo" id="brimo" placeholder="Brimo" value="<?php echo $brimo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Qris <?php echo form_error('qris') ?></label>
            <input type="text" class="form-control" name="qris" id="qris" placeholder="Qris" value="<?php echo $qris; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Edc <?php echo form_error('edc') ?></label>
            <input type="text" class="form-control" name="edc" id="edc" placeholder="Edc" value="<?php echo $edc; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mapsgis') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>