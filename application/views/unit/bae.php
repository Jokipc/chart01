
<?php $this->load->view('templates/header') ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ;?>template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
 //<?php $this->load->view('templates/meta') ?>
 

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <?php $this->load->view('templates/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
     <?php
        $total_plafon = 0;
        $total_target = 0;
        foreach($data_unit as $val) {
            $total_plafon += $val->plafon;
            $total_target += $val->target;
           
            //echo $val->plafon;
        }
        $percent_target = ($total_plafon/$total_target) * 100;
     ?>

    <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Detail Mantri</strong>
                    </p>

    <div id="graph" style="position: relative; height: 420px; "> </div>
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'nama_mantri',
          xLabelAngle: 60,
          ykeys:  ['plafon', 'target'],
          labels: ['Realiasai', 'Target'],
		  gridTextColor : ['black'],
		  barColors : ['CadetBlue','DarkSalmon'] 
        });
    </script>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>
                    <br>
                    <div class="progress-group">
                      Total Realisasi Unit <?= number_format($percent_target,2),'%' ; ?>
                      <span class="float-right"><b><?= number_format($total_plafon,2,',','.'); ?></b>/<?= number_format($total_target,2,',','.') ?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width:  <?= number_format($percent_target,2),'%' ; ?>"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <br>
                    <div class="progress-group">
                      Outsanding (OS)
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width:100%"></div>
                      </div>
                    </div>
                    <br>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">PH</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 100%"></div>
                      </div>
                    </div>
                    <br>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Recovery
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 100%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>


              <!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Email Categories",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: 67, label: "Inbox" },
			{ y: 28, label: "Archives" },
			{ y: 10, label: "Labels" },
			{ y: 7, label: "Drafts"},
			{ y: 15, label: "Trash"},
			{ y: 6, label: "Spam"}
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>




    

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view('templates/js') ?>
</body>
</html>
