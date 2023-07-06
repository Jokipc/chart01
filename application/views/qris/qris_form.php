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
            <label for="varchar">MID<?php echo form_error('mid') ?></label>
            <input type="number" class="form-control" name="mid" autocomplete="off" required value="<?php echo $mid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Merchant <?php echo form_error('nama_merchant') ?></label>
            <input type="text" class="form-control" name="nama_merchant" id="nama_merchant" autocomplete="off" value="<?php echo $nama_merchant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Norek <?php echo form_error('norek') ?></label>
            <input type="number" class="form-control" name="norek" id="norek" autocomplete="off" placeholder="Norek" value="<?php echo $norek; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Ambil Foto </label>
            <input type="file" name="foto" id="foto" accept="image/*">" />
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" autocomplete="off" maxlength="13" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div> -->
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('qris') ?>" class="btn btn-default">Cancel</a>
	</form>
    </section>
        </body>
        </div>

</html>
<?php $this->load->view('templates/footer'); ?>

