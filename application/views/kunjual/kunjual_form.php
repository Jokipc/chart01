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
        <h2 style="margin-top:0px">Menghubungi Nasabah Pinjaman</h2>
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
            <label for="varchar">Nama Nasabah <?php echo form_error('nama_nasabah') ?></label>
            <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" autocomplete="off" placeholder="Nama Nasabah" value="<?php echo $nama_nasabah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" maxlength="16" autocomplete="off" value="<?php echo $nik; ?>" />
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

