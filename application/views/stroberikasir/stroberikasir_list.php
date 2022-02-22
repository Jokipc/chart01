<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
<center><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></center>
<section class="conten-header">
<div class="col-md-6">
<h2 style="margin-top:0px">Stroberi Kasir List</h2>
</div>
</section>
<section class="content">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class"fa fa-plus"></i>Tambah Data</button>
        <table class="table">
            <tr>
                <th>No</th>
		<th>Pn</th>
		<th>Tgl</th>
		<th>Nama Toko</th>
		<th>Hp</th>
	
            </tr><?php
            foreach ($stroberikasir_data as $stroberikasir)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stroberikasir->pn ?></td>
			<td><?php echo $stroberikasir->tgl ?></td>
			<td><?php echo $stroberikasir->nama_toko ?></td>
			<td><?php echo $stroberikasir->hp ?></td>
      <?php if($this->session->userdata('id_level')==='1' ):; ?>
      <td>
      <?php
      			echo anchor(site_url('bankgaransi/delete/'.$stroberikasir->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
            else:;   
      ?>
      </td>
      <?php endif; ?>
		</tr>
                <?php
            }
            ?>
        </table>
			<div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		            <?php echo anchor(site_url('stroberikasir/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	          </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
</section>

<!-- datepicker -->

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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Stroberi Kasir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>stroberikasir/create_action" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" disabled id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />
            <input type="hidden" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />
        </div>
        <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="datepicker" autocomplete="off" placeholder="Tgl" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Toko<?php echo form_error('nama_nasabah') ?></label>
            <input type="text" class="form-control" name="nama_toko" id="nama_toko" required autocomplete="off" placeholder="Nama" value="" />
        </div>
        <div class="form-group">
            <label for="int">No Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="hp" autocomplete="off" id="hp" placeholder="No Hp" value="" />
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>