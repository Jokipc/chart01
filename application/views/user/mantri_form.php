<?php if($this->session->userdata('id_level')==='2'):?> 
<head>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
        <h2 style="margin-top:0px">User  <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" disabled value="<?php echo $branch; ?>" />
            <input type="text" hidden class="form-control" name="branch" id="branch" placeholder="Branch"  value="<?php echo $branch; ?>" />
            
        </div>
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" disabled value="<?php echo $pn; ?>" />
            <input type="text" hidden class="form-control" name="pn" id="pn" placeholder="Pn"  value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mantri <?php echo form_error('nama_mantri') ?></label>
            <input type="text" class="form-control" name="nama_mantri" id="nama_mantri" disabled  placeholder="Nama Mantri" value="<?php echo $nama_mantri; ?>" />
            <input type="text" hidden class="form-control" name="nama_mantri" id="nama_mantri"  placeholder="Nama Mantri" value="<?php echo $nama_mantri; ?>" />
        </div>
	  
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="" />
        </div>
	    
	    <input type="hidden" name="id_pn" value="<?php echo $id_pn; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        
	</form>
    </div>
    </body>
</html>
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>
