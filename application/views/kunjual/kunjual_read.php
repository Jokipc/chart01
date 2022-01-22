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
        <h2 style="margin-top:0px">Kunjual Read</h2>
        <table class="table">
	    <tr><td>Pn</td><td><?php echo $pn; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Nama Nasabah</td><td><?php echo $nama_nasabah; ?></td></tr>
	    <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kunjual') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      </section>
        </body>
        </div>

</html>
<?php $this->load->view('templates/footer'); ?>