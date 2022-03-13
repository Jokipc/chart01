<!doctype html>

 <title></title>
        
    
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
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
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
     <div class="content-wrapper" style="min-height: 955.807px;">
     <br>
     <ul>
        <h2 style="margin-top:0px">Update Qris</h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="date">Pn<?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="" autocomplete="off" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal<?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="datepicker" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Rekening <?php echo form_error('norek') ?></label>
            <input type="number" class="form-control" name="norek" id="norek" autocomplete="off" maxlength="15" placeholder="0000000000000000" value="<?php echo $norek; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Qris <?php echo form_error('nama_qris') ?></label>
            <input type="text" class="form-control" name="nama_qris" id="nama_qris" autocomplete="off" placeholder="Nama Qris" value="<?php echo $nama_qris; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" autocomplete="off" maxlength="13" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('home') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section>
        </body>
        </div>

</html>
<?php $this->load->view('templates/footer'); ?>

