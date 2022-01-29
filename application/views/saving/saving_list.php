<?php if($this->session->userdata('id_level')==='1'):?> <!doctype html>
<html>
    <head>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebaradmin'); ?>
<?php $this->load->view('templates/meta'); ?>
<?php $this->load->view('templates/js'); ?>
    </head>

    <body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">jsGrid</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="jsGrid1"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="../../plugins/jsgrid/demos/db.js"></script>
<script src="../../plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
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