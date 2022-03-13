
<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
<center><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></center>
<section class="conten-header">
<div class="row">
<h2 style="margin-top:0px">IBBIZ List</h2>
<div class="col-md-0"></div>
<div class="col-md-6">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class"fa fa-plus"></i>Tambah Data</button>
</div>
<div class="col-md-6">
<form action="<?php echo site_url('ibbiz/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="pn" value="<?php echo $pn; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($pn <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ibbiz'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
</div>
</div>
</section>
<section class="content"> 
  <table class="table">
            <tr>
                <th>No</th>
		        <th>Pn</th>
		        <th>Tgl</th>
		        <th>Norek</th>
		        <th>Nama</th>
		        <th>No Hp</th>
            <?php if($this->session->userdata('id_level')==='1' ):; ?>
                <th>Action</th>   
                <?php endif; ?>
            </tr><?php
            foreach ($ibbiz_data as $ibbiz)
            {
                ?>
                <tr>
			        <td width="80px"><?php echo ++$start ?></td>
			        <td><?php echo $ibbiz->pn ?></td>
			        <td><?php echo $ibbiz->tgl ?></td>
			        <td><?php echo $ibbiz->norek ?></td>
			        <td><?php echo $ibbiz->nama ?></td>
			        <td><?php echo $ibbiz->no_hp ?></td>
              <td>
              <?php if($this->session->userdata('id_level')==='1' ):; ?>
      <?php
            echo anchor(site_url('ibbiz/update/'.$ibbiz->id),'Update'); 
            echo ' | '; 
      			echo anchor(site_url('ibbiz/delete/'.$ibbiz->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('ibbiz/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input IBBIZ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>ibbiz/create_action" method="post">
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" disabled id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />
            <input type="hidden" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $this->session->userdata('pn');?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" required id="datepicker" autocomplete="off" placeholder="Tgl" value="" />
        </div>
        <div class="form-group">
            <label for="int">Norek <?php echo form_error('norek') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="norek" autocomplete="off" id="norek" placeholder="Norek" value="" />
        </div>
	    <div class="form-group">
            <label for="int">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" required id="nama" autocomplete="off" placeholder="Nama" value="" />
        </div>
	    <div class="form-group">
            <label for="int">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="no_hp" autocomplete="off" id="no_hp" placeholder="No Hp" value="" />
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
