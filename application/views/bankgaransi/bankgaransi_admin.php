
<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
<section class="conten-header">
<h2 style="margin-top:0px">Bank Garansi List</h2>
</section>
<section class="content">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class"fa fa-plus"></i>Tambah Data</button>
    <table class="table">
        <tr>
            <th>No</th>
		    <th>Pn</th>
		    <th>Tgl</th>
		    <th>Norek</th>
		    <th>Nama</th>
		    <th>Plafond</th>
            <th>Action</th>
        </tr>
        </tr><?php
            foreach ($bankgaransi_data as $bankgaransi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bankgaransi->pn ?></td>
			<td><?php echo $bankgaransi->tgl ?></td>
			<td><?php echo $bankgaransi->norek ?></td>
			<td><?php echo $bankgaransi->nama ?></td>
			<td><?php echo $bankgaransi->plafond ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('bankgaransi/read/'.$bankgaransi->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('bankgaransi/update/'.$bankgaransi->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('bankgaransi/delete/'.$bankgaransi->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </section>

       
        
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('bankgaransi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </body>
</html>

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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Bank Garansi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>bankgaransi/create_action" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="datepicker" autocomplete="off" placeholder="Tgl" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Norek <?php echo form_error('norek') ?></label>
            <input type="text" class="form-control" name="norek" id="norek" autocomplete="off" placeholder="Norek" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" placeholder="Nama" value="" />
        </div>
	    <div class="form-group">
            <label for="int">Plafond <?php echo form_error('plafond') ?></label>
            <input type="text" class="form-control" name="plafond" autocomplete="off" id="plafond" placeholder="Plafond" value="" />
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>