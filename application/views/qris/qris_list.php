
<div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:90%">
    <center><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></center>
    <h2 style="margin-top:0px">Data Qris</h2><br><br><br>
    <?php if($this->session->userdata('id_level')!=='1' ):; ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class"fa fa-plus"></i>Tambah Data</button>
    <?php endif; ?>
    <div class="container-sm">
          
          <div class="row">
          
                
            <div class="col-md-0"></div>
            <div class="col-md-12"></div>
                
                
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
			        <td ><img src="<?php echo base_url() ;?>template/dist/img/<?php echo $qris->foto ?>"class="rounded-lg" width="50" height="60"  alt=""></td>
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
            <?php if($this->session->userdata('id_level')==='1' ):; ?>   
            <?php echo form_open_multipart('upload/do_upload');?>
            <br><br><br><br>
              <h5 style="margin-top:0px">Update Sales Volume :</h5>
              <input type="file" name="userfile" size="20" />
              <input  type="submit" value="upload" />
            </form>
            <?php endif; ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
            
        </div>
  </div>
</div>



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
            <label for="date">MID <?php echo form_error('mid') ?></label>
            <input type="number" class="form-control" name="mid" autocomplete="off" placeholder="MID Merchant" value="" pattern="[0-9]+" required />
        </div>
        <div class="form-group">
            <label for="int">Nama Merchant <?php echo form_error('nama_merchant') ?></label>
            <input type="text" class="form-control" required name="nama_merchant" autocomplete="off" id="nama_merchant" placeholder="nama_merchant" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">No Rekening<?php echo form_error('norek') ?></label>
            <input type="number" class="form-control" name="norek" id="norek" pattern="[0-9]+" required autocomplete="off" placeholder="No Rekening" value="" />
        </div>
        <div class="form-group">
            <label for="int">Ambil Foto </label>
            <input type="file" name="foto" id="foto" accept="image/*">
        </div>
        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>

        

      </form>
      </div>
    </div>
  </div></div>
