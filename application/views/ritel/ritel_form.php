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
        <h2 style="margin-top:0px">Ritel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id <?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?php echo $id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Branch <?php echo form_error('branch') ?></label>
            <input type="text" class="form-control" name="branch" id="branch" placeholder="Branch" value="<?php echo $branch; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pn <?php echo form_error('pn') ?></label>
            <input type="text" class="form-control" name="pn" id="pn" placeholder="Pn" value="<?php echo $pn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Rm <?php echo form_error('nama_rm') ?></label>
            <input type="text" class="form-control" name="nama_rm" id="nama_rm" placeholder="Nama Rm" value="<?php echo $nama_rm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Koderm <?php echo form_error('koderm') ?></label>
            <input type="text" class="form-control" name="koderm" id="koderm" placeholder="Koderm" value="<?php echo $koderm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rm Segemen <?php echo form_error('rm_segemen') ?></label>
            <input type="text" class="form-control" name="rm_segemen" id="rm_segemen" placeholder="Rm Segemen" value="<?php echo $rm_segemen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Ibbiz <?php echo form_error('t_ibbiz') ?></label>
            <input type="text" class="form-control" name="t_ibbiz" id="t_ibbiz" placeholder="T Ibbiz" value="<?php echo $t_ibbiz; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Ibbiz <?php echo form_error('b_ibbiz') ?></label>
            <input type="text" class="form-control" name="b_ibbiz" id="b_ibbiz" placeholder="B Ibbiz" value="<?php echo $b_ibbiz; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Bristore <?php echo form_error('t_bristore') ?></label>
            <input type="text" class="form-control" name="t_bristore" id="t_bristore" placeholder="T Bristore" value="<?php echo $t_bristore; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Bristore <?php echo form_error('b_bristore') ?></label>
            <input type="text" class="form-control" name="b_bristore" id="b_bristore" placeholder="B Bristore" value="<?php echo $b_bristore; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Bankgaransi <?php echo form_error('t_bankgaransi') ?></label>
            <input type="text" class="form-control" name="t_bankgaransi" id="t_bankgaransi" placeholder="T Bankgaransi" value="<?php echo $t_bankgaransi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Bankgaransi <?php echo form_error('b_bankgaransi') ?></label>
            <input type="text" class="form-control" name="b_bankgaransi" id="b_bankgaransi" placeholder="B Bankgaransi" value="<?php echo $b_bankgaransi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Penyalurankur <?php echo form_error('t_penyalurankur') ?></label>
            <input type="text" class="form-control" name="t_penyalurankur" id="t_penyalurankur" placeholder="T Penyalurankur" value="<?php echo $t_penyalurankur; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Penyalurankur <?php echo form_error('b_penyalurankur') ?></label>
            <input type="text" class="form-control" name="b_penyalurankur" id="b_penyalurankur" placeholder="B Penyalurankur" value="<?php echo $b_penyalurankur; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Realkeci <?php echo form_error('t_realkeci') ?></label>
            <input type="text" class="form-control" name="t_realkeci" id="t_realkeci" placeholder="T Realkeci" value="<?php echo $t_realkeci; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Realkecil <?php echo form_error('b_realkecil') ?></label>
            <input type="text" class="form-control" name="b_realkecil" id="b_realkecil" placeholder="B Realkecil" value="<?php echo $b_realkecil; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Pemi <?php echo form_error('t_pemi') ?></label>
            <input type="text" class="form-control" name="t_pemi" id="t_pemi" placeholder="T Pemi" value="<?php echo $t_pemi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Premi <?php echo form_error('b_premi') ?></label>
            <input type="text" class="form-control" name="b_premi" id="b_premi" placeholder="B Premi" value="<?php echo $b_premi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Ekstrakom <?php echo form_error('t_ekstrakom') ?></label>
            <input type="text" class="form-control" name="t_ekstrakom" id="t_ekstrakom" placeholder="T Ekstrakom" value="<?php echo $t_ekstrakom; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Ekstrakom <?php echo form_error('b_ekstrakom') ?></label>
            <input type="text" class="form-control" name="b_ekstrakom" id="b_ekstrakom" placeholder="B Ekstrakom" value="<?php echo $b_ekstrakom; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Britama <?php echo form_error('t_britama') ?></label>
            <input type="text" class="form-control" name="t_britama" id="t_britama" placeholder="T Britama" value="<?php echo $t_britama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Britama <?php echo form_error('b_britama') ?></label>
            <input type="text" class="form-control" name="b_britama" id="b_britama" placeholder="B Britama" value="<?php echo $b_britama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Payrol <?php echo form_error('t_payrol') ?></label>
            <input type="text" class="form-control" name="t_payrol" id="t_payrol" placeholder="T Payrol" value="<?php echo $t_payrol; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Payrol <?php echo form_error('b_payrol') ?></label>
            <input type="text" class="form-control" name="b_payrol" id="b_payrol" placeholder="B Payrol" value="<?php echo $b_payrol; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Edc <?php echo form_error('t_edc') ?></label>
            <input type="text" class="form-control" name="t_edc" id="t_edc" placeholder="T Edc" value="<?php echo $t_edc; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Edc <?php echo form_error('b_edc') ?></label>
            <input type="text" class="form-control" name="b_edc" id="b_edc" placeholder="B Edc" value="<?php echo $b_edc; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Giro <?php echo form_error('t_giro') ?></label>
            <input type="text" class="form-control" name="t_giro" id="t_giro" placeholder="T Giro" value="<?php echo $t_giro; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Giro <?php echo form_error('b_giro') ?></label>
            <input type="text" class="form-control" name="b_giro" id="b_giro" placeholder="B Giro" value="<?php echo $b_giro; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Tabungan <?php echo form_error('t_tabungan') ?></label>
            <input type="text" class="form-control" name="t_tabungan" id="t_tabungan" placeholder="T Tabungan" value="<?php echo $t_tabungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Tabungan <?php echo form_error('b_tabungan') ?></label>
            <input type="text" class="form-control" name="b_tabungan" id="b_tabungan" placeholder="B Tabungan" value="<?php echo $b_tabungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Brimola <?php echo form_error('t_brimola') ?></label>
            <input type="text" class="form-control" name="t_brimola" id="t_brimola" placeholder="T Brimola" value="<?php echo $t_brimola; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Brimola <?php echo form_error('b_brimola') ?></label>
            <input type="text" class="form-control" name="b_brimola" id="b_brimola" placeholder="B Brimola" value="<?php echo $b_brimola; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Digitalsav <?php echo form_error('t_digitalsav') ?></label>
            <input type="text" class="form-control" name="t_digitalsav" id="t_digitalsav" placeholder="T Digitalsav" value="<?php echo $t_digitalsav; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Digitalsav <?php echo form_error('b_digitalsav') ?></label>
            <input type="text" class="form-control" name="b_digitalsav" id="b_digitalsav" placeholder="B Digitalsav" value="<?php echo $b_digitalsav; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Kpr <?php echo form_error('t_kpr') ?></label>
            <input type="text" class="form-control" name="t_kpr" id="t_kpr" placeholder="T Kpr" value="<?php echo $t_kpr; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Kpr <?php echo form_error('b_kpr') ?></label>
            <input type="text" class="form-control" name="b_kpr" id="b_kpr" placeholder="B Kpr" value="<?php echo $b_kpr; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Debkpr <?php echo form_error('t_debkpr') ?></label>
            <input type="text" class="form-control" name="t_debkpr" id="t_debkpr" placeholder="T Debkpr" value="<?php echo $t_debkpr; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Debkpr <?php echo form_error('b_debkpr') ?></label>
            <input type="text" class="form-control" name="b_debkpr" id="b_debkpr" placeholder="B Debkpr" value="<?php echo $b_debkpr; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Kk <?php echo form_error('t_kk') ?></label>
            <input type="text" class="form-control" name="t_kk" id="t_kk" placeholder="T Kk" value="<?php echo $t_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Kk <?php echo form_error('b_kk') ?></label>
            <input type="text" class="form-control" name="b_kk" id="b_kk" placeholder="B Kk" value="<?php echo $b_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Briguna <?php echo form_error('t_briguna') ?></label>
            <input type="text" class="form-control" name="t_briguna" id="t_briguna" placeholder="T Briguna" value="<?php echo $t_briguna; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Briguna <?php echo form_error('b_briguna') ?></label>
            <input type="text" class="form-control" name="b_briguna" id="b_briguna" placeholder="B Briguna" value="<?php echo $b_briguna; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">T Debbriguna <?php echo form_error('t_debbriguna') ?></label>
            <input type="text" class="form-control" name="t_debbriguna" id="t_debbriguna" placeholder="T Debbriguna" value="<?php echo $t_debbriguna; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B Debbriguna <?php echo form_error('b_debbriguna') ?></label>
            <input type="text" class="form-control" name="b_debbriguna" id="b_debbriguna" placeholder="B Debbriguna" value="<?php echo $b_debbriguna; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ritel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>