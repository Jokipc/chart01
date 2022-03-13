
<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
<center><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></center>
<section class="conten-header">
<div class="row">
<h2 style="margin-top:0px">Pijar / Davestera List</h2>
<div class="col-md-0"></div>
<div class="col-md-6">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class"fa fa-plus"></i>Tambah Data</button>
</div>
<div class="col-md-6">
<form action="<?php echo site_url('premi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="pn" value="<?php echo $pn; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($pn <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('premi'); ?>" class="btn btn-default">Reset</a>
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
		        <th>Plafond</th>
            <?php if($this->session->userdata('id_level')==='1' ):; ?>
                <th>Action</th>   
                <?php endif; ?>
            </tr>
            <?php
            foreach ($premi_data as $premi)
            {
            ?>
                <tr>
			        <td width="80px"><?php echo ++$start ?></td>
			        <td><?php echo $premi->pn ?></td>
			        <td><?php echo $premi->tgl ?></td>
			        <td><?php echo $premi->norek ?></td>
			        <td><?php echo $premi->nama ?></td>
			        <td><?php echo $premi->plafond ?></td>
              <?php if($this->session->userdata('id_level')==='1' ):; ?>
      <td>
      <?php
            echo anchor(site_url('premi/update/'.$premi->id),'Update'); 
            echo ' | '; 
      			echo anchor(site_url('premi/delete/'.$premi->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('premi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Input Pijar/Davestera</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>premi/create_action" method="post">
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
            <label for="varchar">Norek <?php echo form_error('norek') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="norek" id="norek" autocomplete="off" placeholder="Norek" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off" placeholder="Nama" value="" />
        </div>
	    <div class="form-group">
            <label for="int">Plafond <?php echo form_error('plafond') ?></label>
            <input type="text" pattern="[0-9]+" title="only letters" class="form-control" name="plafond" required autocomplete="off" id="plafond" placeholder="Plafond" value="" />
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>