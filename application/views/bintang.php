
<!doctype html>
<html>
<head>
<?php $this->load->view('templates/js'); ?>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php if($this->session->userdata('side')==='3' ):?> 
<?php $this->load->view('templates/sidebaradminunit'); ?>
<?php elseif($this->session->userdata('id_level')==='1' ): ?>
<?php $this->load->view('templates/sidebaradmin'); ?>


<?php else: ?>
<?php endif;?>



