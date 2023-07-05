<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
    <center><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></center>
<div class="container-sm">
    
          <div class="row">
            <h2 style="margin-top:0px">Data Qris</h2>
            <!-- <div class="col-md-0"></div>
            <div class="col-md-6"></div> -->
            <div class="col-md-6">

              <form action="<?php echo site_url('qris/index'); ?>" class="form-inline" method="get">
                    <div class="input-group"></div>
              </form>
            </div>
          </div>
      


  <div class="table-responsive">
    <table class="table" >
        <tr class="table-success">
              <th>No</th>
		          <th>ID Merchant</th>
		          <th>Nama Merchant</th>
		          <th>Sales Volume</th>
		          <th>Saldo</th>
              <th>Nama PIC</th>
              <th>Unit</th>
		          <th>Foto</th>
                <?php if($this->session->userdata('id_level')==='1' ):; ?>
              <th>Action</th>   
                <?php endif; ?>
        </tr>
                <?php
                foreach ($qris_data as $qris){
                ?>
        <tr>
			        <td><?php echo ++$start ?></td>
			        <td><?php echo $qris->mid ?></td>
			        <td><?php echo strtoupper($qris->nama_merchant) ?></td>
			        <td><?php echo "Rp " . number_format($qris->saldo,2,',','.') ?></td>
              <td><?php echo "Rp " . number_format($qris->sales_volume,2,',','.') ?></td>
              <td><?php echo strtoupper($qris->nama_mantri)?></td>
              <td><?php echo $qris->unit ?></td>
			        <td ><img src="<?php echo base_url() ;?>template/dist/img/<?php echo $qris->foto ?>"class="rounded-lg" width="75"  alt=""></td>
                <?php if($this->session->userdata('id_level')==='1' ):; ?>
              <td>
                <?php
                echo anchor(site_url('qris/update/'.$qris->id),'Detail'); 
                echo ' | '; 
                echo anchor(site_url('qris/delete/'.$qris->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                else:;   
                ?>
              </td>
                <?php endif; ?>
	      </tr>
                <?php }?>
           
    </table>
  </div> 
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		              <?php echo anchor(site_url('qris/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	          </div></div>

            <div>
                <?php echo form_open_multipart('upload/do_upload');?>
            <br><br><br><br>
              <h5 style="margin-top:0px">Update Sales Volume :</h5>
              <input type="file" name="userfile" size="20" />
              <input  type="submit" value="upload" />
            </form>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
            
        </div>
  </div>
</div>
<!-- datepicker -->

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"

});
  } );
  </script> -->

<!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Qris</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>qris/create_action" method="post">
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
            <label for="int">Norek <?php echo form_error('norek') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="norek" autocomplete="off" id="norek" placeholder="Norek" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Qris<?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama_qris" id="nama_qris" required autocomplete="off" placeholder="Nama" value="" />
        </div>
        <div class="form-group">
            <label for="int">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" pattern="[0-9]+" required name="hp" autocomplete="off" id="hp" placeholder="No Hp" value="" />
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>

        

      </form>
      </div>
    </div>
  </div> -->
