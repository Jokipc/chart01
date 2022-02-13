<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
    <?php $this->load->view('templates/js'); ?>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>






<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>
</center
<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>