<!doctype html>

     
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
    </head>

    <body>
     <div class="content-wrapper" style="min-height: 955.807px;">
     <br>
     <ul>

        <h2 style="margin-top:0px">Strowberi Kasir / Tagihan</h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="date">Pn<?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="" autocomplete="off" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="datepicker" placeholder="yyyy-mm-dd" autocomplete="off" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Toko <?php echo form_error('nama_toko') ?></label>
            <input type="text" class="form-control" name="nama_toko" id="nama_toko" autocomplete="off" placeholder="Nama Toko" value="<?php echo $nama_toko; ?>" />
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
