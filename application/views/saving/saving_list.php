<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>

    <body>
    <div class="content-wrapper" style="min-height: 955.807px;"> 
    <section class="content">
      
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <tr>
                <th>No</th>
		        <th>Pn</th>
		        <th>Tgl</th>
		        <th>Norek</th>
				<th>Action</th>
            </tr><?php
            foreach ($saving_data as $saving)
            {
                ?>
            <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $saving->pn ?></td>
			<td><?php echo $saving->tgl ?></td>
			<td><?php echo $saving->norek ?></td>            
			<td><?php echo $saving->norek ?></td>            
			<td style="text-align:center" width="200px">
				<?php 
				
				echo anchor(site_url('saving/delete/'.$saving->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		    </tr>
                <?php
            }
            ?>
    </table>
      
 
  
    </section>
    
    </body>
</html>

<?php $this->load->view('templates/footer'); ?>
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>