<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
            body {
                margin: 0;
                padding: 0;
                padding-top: 65px ;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                background: #F2F3F4;
            }

	  </style>
</head>
<body>
  <div class="container">


      <h2>User Login</h2>
      <?php
      if(!empty($success_msg)){
          echo '<p class="statusMsg">'.$success_msg.'</p>';
      }elseif(!empty($error_msg)){
          echo '<p class="statusMsg">'.$error_msg.'</p>';
      }
      ?>
      <form action="" method="post">
          <div class="form-group has-feedback">
              <input type="username" class="form-control" name="username" placeholder="Username" required="" value="">
              <?php echo form_error('username','<span class="help-block">','</span>'); ?>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="">
            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
          </div>
          <div class="form-group">
              <input type="submit" name="loginSubmit" class="btn-primary" value="Submit"/>
          </div>
      </form>
      <p class="footInfo">Don't have an account? <a href="<?php echo base_url(); ?>index.php/users/registration">Register here</a></p>
  </div>
</body>
</html>
