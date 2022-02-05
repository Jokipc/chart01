<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
    <?php $this->load->view('templates/js'); ?>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>

<!-- css bintang -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url() ;?>template/dist/css/a.js"></script>
<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/a.less">
<!-- akhircss bintang -->

<!--css tabel  -->
<script src="<?php echo base_url() ;?>template/dist/css/b.js"></script>
<link rel="stylesheet"	href="<?php echo base_url() ;?>template/dist/css/tabel.css">
<!-- akhir css tabel -->
 
<!-- table -->
<section>
<div class="d-flex flex-column bd-highlight mb-3" style="background-color:blue,1">

  <!--for demo wrap-->
  <h1>Table UNit 4DX</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>No</th>
          <th>Unit</th>
          <th>Brimo</th>
          <th>Qris</th>
          <th>Saving</th>
          <th>Kunjual</th>
          <th>Stoberi Kasir</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <?php 
          $num = 0;
          foreach( $data as $val){
					$num++;
         
					print 
          '<th></th>
          <th></th>
          <td>'.$num.'</td>
          <td>'.$val->unit.'</td>
          <td>
<div class="star-ratings">
  <div class="fill-ratings" style="width: '.$val->real_brimo.'%;">
    <span>★★★★★</span>
  </div>
  <div class="empty-ratings">
    <span>★★★★★</span>
  </div>
</div>
<!-- akhir bintang --></td>
          <td><!-- bintang -->
<div class="star-ratings">
  <div class="fill-ratings" style="width:'.$val->real_qris.'%;">
    <span>★★★★★</span>
  </div>
  <div class="empty-ratings">
    <span>★★★★★</span>
  </div>
</div>
<!-- akhir bintang --></td>
          <td><!-- bintang -->
<div class="star-ratings">
  <div class="fill-ratings" style="width: '.$val->real_saving.'%;">
    <span>★★★★★</span>
  </div>
  <div class="empty-ratings">
    <span>★★★★★</span>
  </div>
</div>
<!-- akhir bintang --></td>
          <td><!-- bintang -->
<div class="star-ratings">
  <div class="fill-ratings" style="width: '.$val->real_kunjual.'%;">
    <span>★★★★★</span>
  </div>
  <div class="empty-ratings">
    <span>★★★★★</span>
  </div>
</div>
<!-- akhir bintang --></td>
<td><!-- bintang -->
<div class="star-ratings">
  <div class="fill-ratings" style="width: '.$val->real_stroberikasir.'%;">
    <span>★★★★★</span>
  </div>
  <div class="empty-ratings">
    <span>★★★★★</span>
  </div>
</div>
<!-- akhir bintang --></td>
        </tr>';}
        ?>
       
      </tbody>
    </table>
  </div>
  </div> 
</section>


<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://github.com/Jokipc/">Jokipc</a>
</div>
<!-- akhir table -->



<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>