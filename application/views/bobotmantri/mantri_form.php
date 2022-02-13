<?php if($this->session->userdata('id_level')==='1'):?> 
<head>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <div class="content-wrapper" style="min-height: 955.807px;border:0px; heigth:100%; overflow:auto; float:left; width:100%">
        <h2 style="margin-top:0px">Target Mantri <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
        <table>
        <tr>
        <td>    
	    <div class="form-group">
            <label for="int">Bobot Saving <?php echo form_error('bsaving') ?></label>
            <input type="text" class="form-control" onkeyup="sum();" name="bsaving" id="bsaving"  value="<?php echo $bsaving; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bobot Brimo<?php echo form_error('bbrimo') ?></label>
            <input type="text" class="form-control" onkeyup="sum();" name="bbrimo" id="bbrimo" value="<?php echo $bbrimo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bobot Qris <?php echo form_error('bqris') ?></label>
            <input type="text" class="form-control"  onkeyup="sum();" name="bqris" id="bqris" placeholder="Bqris" value="<?php echo $bqris; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bobot Kunjual <?php echo form_error('bkunjual') ?></label>
            <input type="text" class="form-control"  onkeyup="sum();"name="bkunjual" id="bkunjual" placeholder="Bkunjual" value="<?php echo $bkunjual; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bobot Stroberi Kasir <?php echo form_error('bstroberikasir') ?></label>
            <input type="text" class="form-control"  onkeyup="sum();" name="bstroberikasir" id="bstroberikasir" placeholder="Bstroberikasir" value="<?php echo $bstroberikasir; ?>" />
        </div>
        
        </td>
        <td>&nbsp</td>
        <td>&nbsp</td>
        <td>
	    <div class="form-group">
            <label for="int">Tareget Saving <?php echo form_error('saving') ?></label>
            <input type="text" class="form-control" name="saving" id="saving" placeholder="Saving" value="<?php echo $saving; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Target Qris <?php echo form_error('qris') ?></label>
            <input type="text" class="form-control" name="qris" id="qris" placeholder="Qris" value="<?php echo $qris; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Target Brimo <?php echo form_error('brimo') ?></label>
            <input type="text" class="form-control" name="brimo" id="brimo" placeholder="Brimo" value="<?php echo $brimo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Target Kunjual <?php echo form_error('kunjual') ?></label>
            <input type="text" class="form-control" name="kunjual" id="kunjual" placeholder="Kunjual" value="<?php echo $kunjual; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="int">Target Stroberikasir <?php echo form_error('stroberikasir') ?></label>
            <input type="text" class="form-control" name="stroberikasir" id="stroberikasir" placeholder="Stroberikasir" value="<?php echo $stroberikasir; ?>" />
        </div>
        
        </td>
        </tr>
        <tr>
        <td>
            <div class="form-group">
            <label for="int">Total Bobot</label>
            <input type="text" class="form-control" style="color:blue" id="hasil" disabled value="<?php echo $bstroberikasir+$bsaving+$bkunjual+$bqris+$bkunjual; ?>" />
            </div>
        </td>
        </tr>
        </table>
	    
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
	</form>
        </div>
    </body>

    <script>
    function sum() {
      var txt1NumberValue = document.getElementById('bsaving').value;
      var txt2NumberValue = document.getElementById('bqris').value;
      var txt3NumberValue = document.getElementById('bbrimo').value;
      var txt4NumberValue = document.getElementById('bkunjual').value;
      var txt5NumberValue = document.getElementById('bstriberikasir').value;
      
      var result = parseInt(txt1NumberValue) + parseInt(txt2NumberValue) + parseInt(txt3NumberValue) + parseInt(txt4NumberValue) + parseInt(txt5NumberValue);
      if (!isNaN(result)) {
         document.getElementById('hasil').value = result;
      }
}
</script>




</html>
<?php else: ?>
<br>
<br>
<center>
<h3><?= "tidak di izinkan!!, Login Dengan Benar" ?></h3>

<a href="<?php echo site_url('login') ?>" class="btn btn-default">Login</a>
<?php endif;?>