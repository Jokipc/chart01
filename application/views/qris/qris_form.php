<!doctype html>
<html>
     <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>

    <body>
     <div class="content-wrapper" style="min-height: 955.807px;">
     
        <h2 style="margin-top:0px">Qris <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Norek <?php echo form_error('norek') ?></label>
            <input type="text" class="form-control" name="norek" id="norek" placeholder="Norek" value="<?php echo $norek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Qris <?php echo form_error('nama_qris') ?></label>
            <input type="text" class="form-control" name="nama_qris" id="nama_qris" placeholder="Nama Qris" value="<?php echo $nama_qris; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('qris') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section>
        </body>
        </div>

</html>
<?php $this->load->view('templates/footer'); ?>