<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
  
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <marquee loop="1000" scrolldelay="100"> <table><b><h4>
       
            <?php
            $no = 1;
            foreach ($mantri_data as $mantri)
            {?>
          <?= $no++, ".";?>
          <?= $mantri->nama_mantri ,"&nbsp&nbsp&nbsp&nbsp";?>
          <?= " ";?>
		
            <?php
            }
            ?>
        </table></h4><b></marquee>
     
    </ul>
  </nav>
      

