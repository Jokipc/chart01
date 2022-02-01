<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>

  <body>
 
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
      <div class="content">
       
         <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
           <h4><b>Please sign in</b></h4>

           <?php echo $this->session->flashdata('msg');?>
           <br>
           <label for="pn" class="sr-only">Personal Number</label>
           <input type="pn" name="pn" class="form-control" autocomplete="off" placeholder="Personal Number" required autofocus>
           <label for="password" class="sr-only">Password</label>
           <input type="password" name="password" class="form-control" placeholder="Password" required>
           <div class="checkbox">
             <label>
               <input type="checkbox" value="remember-me"> Remember me
             </label>
           </div>
           <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         </form>
       </div>
       </div> <!-- /container -->

       <div>
       
      </div>
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/login.css'?>">
  </body>
</html>