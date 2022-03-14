
<html>
    <head>
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
             <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"

});
  } );
  </script>
    </head>
    <body>
    <div class="content-wrapper" style="min-height: 555.807px;border:0px;  overflow:auto; float:left; width:100%">
        <h2 style="margin-top:0px">PKS Payroll<?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="datepicker" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama PKS<?php echo form_error('nama_pkspayroll') ?></label>
            <input type="text" class="form-control" name="nama_pkspayroll" id="nama_pkspayroll" placeholder="Nama PKS" value="<?php echo $nama_pkspayroll; ?>" />
        </div>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penyalurankur') ?>" class="btn btn-default">Cancel</a>
	</form>
        </div>
	</form>
    </body>
</html>