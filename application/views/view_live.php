<audio hidden autoplay loop>
     <source src="<?php echo base_url() ;?>audio/padi.mp3" type="audio/mpeg">
    Browsermu tidak mendukung tag audio, upgrade donk!
  </audio>

<object class="rank-unit" style="object-fit: cover;" width="100%" height="100%" data="<?php echo base_url();?>rank/unit"></object>
<object class="rank" style="object-fit: cover;" width="100%" height="100%" data="<?php echo base_url();?>rank"></object>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
 
  $("object.rank").hide();
  setTimeout(
  function() 
  {
        $("object.rank-unit").hide();
        $("object.rank").show(100);
  }, 120000);
  
  setTimeout(
  function() 
  {
    location.reload();    
  }, 280000);

			
	
  
	
</script>

<style>
    

